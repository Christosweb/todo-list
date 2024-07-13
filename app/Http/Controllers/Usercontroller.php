<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active;
use App\Models\User;
use App\Models\Task;
use App\Models\Checkbox;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    //
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

    public function find(Task $task, Checkbox $checkbox)
    {
       
        $tasks = $task->showAllTask();
        $check_box = $checkbox->retrieveCheck();
        // return $tasks;
        return view('tasks', ['tasks'=>$tasks, 'isChecked' => $check_box]);
    }

    public function isChecked(Request $request, Checkbox $checkbox)
    {
        $check = $request->getContent(); 
        $checkToStr = json_decode($check);
        $checkbox->add($checkToStr);
    }

    public function unCheck(Request $request, Checkbox $checkbox)
    {
        $check = $request->getContent(); 
        $checkToStr = json_decode($check);
        $checkbox->remove($checkToStr);
    }

    public function completed(Task $task)
    {
      $completedTasks = $task->showCompletedTasks();
      return view('completed', ['completedTasks' => $completedTasks]);
    }

    public function active(Task $task)
    {
        $actives = $task->showActiveTasks();
        return view('active', ['actives' => $actives]);
    }

    public function getEdit($id, Task $task)
    {
        $task =  $task->updateTask($id);
        return view('task_edit', ['task'=>$task]);
    }

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

    public function getUser(User $user)
    {
        $user = $user->create();
        return view('user.profile', ['user'=>$user]);
    }

    public function updateUserProfile($id, User $user, Request $request)
    {
        //validate request 
        // return $request->all();
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
}
