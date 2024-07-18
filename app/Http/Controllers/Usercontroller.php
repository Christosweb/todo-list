<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Task;
use App\Models\Checkbox;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;

class Usercontroller extends Controller
{
    //

    /**
     * store task to Tasks databse by calling the createTask method of Task instance
     */
    public function store(Request $request, Task $task)
    {
    
        $user_task = $request->getContent(); 
        $taskAsStr = json_decode($user_task);

        if(!$taskAsStr){
            return response()->json([
                'fail'=> 'input can not be empty.',
                'status'=> false
            ]);
        }else {
            
            $task->createTask($taskAsStr);
         return response()->json([
            'success'=> 'task created successfully',
            'status'=> true
        ]);
        } 
    }

    /**
     * retrieve task from Tasks database by calling the ShowallTask method of Task instance
     * also call retrieveCheck method of checkbox instance.
     */

    public function find(Task $task, Checkbox $checkbox)
    {
       
        $tasks = $task->showAllTask();
        $check_box = $checkbox->retrieveCheck();
    
        return view('tasks', ['tasks'=>$tasks, 'isChecked' => $check_box]);
    }
    /**
     * this method add task_id and user_id to checkboxes database by calling the add method of checkbox instance.
     */
    public function isChecked(Request $request, Checkbox $checkbox)
    {
        $check = $request->getContent(); 
        $checkToStr = json_decode($check);
        $checkbox->add($checkToStr);
    }

    /**
     * this method  remove task_id and user_id from checkboxes database  by calling the remove method of checkbox instance.
     */
    public function unCheck(Request $request, Checkbox $checkbox)
    {
        $check = $request->getContent(); 
        $checkToStr = json_decode($check);
        $checkbox->remove($checkToStr);
    }

    /**
     * this method show the completed task by calling the showCompletedTask method of Task instance
     */
    public function completed(Task $task)
    {
      $completedTasks = $task->showCompletedTasks();
      return view('completed', ['completedTasks' => $completedTasks]);
    }
    /**
     * this method show the active task by calling the showActiveTask method of Task instance
     */
    public function active(Task $task)
    {
        $actives = $task->showActiveTasks();
        return view('active', ['actives' => $actives]);
    }
    /**
     * this method return view to enable user to edit task by calling updateTask method  of Task instance
     */
    public function getEdit($id, Task $task)
    {
        $task =  $task->updateTask($id);
        return view('task_edit', ['task'=>$task]);
    }
    /**
     * this method update the task
     */
    public function update(Request $request,  $id, Task $task)
    {
         $request = $request->getContent();
         $taskToUpdate = json_decode($request);

         if(!$taskToUpdate){
            return response()->json([
                'error'=> 'input is required',
                'status'=> true
            ]);
         }

        $update = $task::findOrFail($id);
        $update->todo = $taskToUpdate;
        $success = $update->save();
        if($success){
            return response()->json([
                'status'=> 'success',
                'message'=> 'task updated successfully.'
            ]);
        }
    }
    /**
     * this method delete task
     */
    public function destroy($id, Task $task)
    {
       $delete = $task::destroy($id);

        if($delete){
            return response()->json([
                'status'=> 'success',
                'message'=> 'task deleted successfully.'
            ]);
        }
    }
    /**
     * this method get the authenticated user by calling the create method of the user instance.
     * return view to show user profile.
     */
    public function getUser(User $user)
    {
        $user = $user->create();
        return view('user.profile', ['user'=>$user]);
    }
    /**
     * this method update user profile
     */
    public function updateUserProfile($id, User $user, Request $request)
    {
        
        $credentials = $request->validate([
            'firstname' => 'required',
            'lastname' =>  'required',
            'email'=> 'required|email',
            'phone' => 'required',
            'age' => 'required',
        ]);

      $user->isUpdate($credentials, $id);
      return back()->with('status', 'profile updated successfully.');


    }
    /**
     * this method reset the password of user by calling the isPasswordReset method of user instance and automatically log out user 
     */
    public function resetPassword($id, User $user, Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password' => ['required','min:6']
        ]);
         

        $user->isPasswordReset($id, $credentials);
        Auth::logout();
        return view('login');

    }
    
    /**
     *  request for forgot password.
     * return email to send link for forgot password form
     */
    public function showEmailForForgotPassword()
    {
        return view('forgot-password');
    }
    
    /**
     * handle the form submission of forgot password return in showEmailForForgotPassword method
     * task: validate the email, send the password reset link to user through the email provided
     */
    public function forgotPasswordEmailSubmissionHandler(Request $request)
    {
        $request->validate(['email'=>['required', 'email']]);

   $status = Password::sendResetLink(
    $request->only('email')
   );

   return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    
    }

    /**
     * show password reset form
     * it is the link that will be sent to the user
     * this contain email field, password field, and confirm_password field and a hidden token field.
     * this token is automatically generated by laravel so you just have to include it in the hidden input field
     * when the user click the link sent to them, this is the form that will display
     */

     public function showForgotPasswordForm($token)
     {
        return view('reset-password', ['token'=> $token]);
     }

     /**
      * handle the form submission of password reset form
      */

      public function forgotPassword(Request $request)
      {
        $request->validate([
            'token'=> 'required',
            'email' => ['required', 'email'],
            'password' => 'required|min:6|confirmed'
         ]);
    
         $status = Password::reset(
            $request->only(['email', 'password', 'password_confirmation', 'token']),
            function(User $user, string $password)
            {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? to_route('login.index')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
      }
}