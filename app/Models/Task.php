<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkbox;

/**
 * this model class create task, retrieve all task, showcompleted task, show active task, update task delete task.
 * @method  the name of the method depict exactly what they do
 *                    
 */
class Task extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function createTask($taskAsStr)
    {   
       $authenticatedUser = Auth::user();
       $user_id = $authenticatedUser->id;

       return  Task::create(['todo'=>$taskAsStr, 'user_id'=>$user_id]);
    }

    public function showAllTask()
    {
        $authenticatedUser = Auth::user();
        $user_id = $authenticatedUser->id;

        $tasks =  Task::where('user_id', $user_id)->simplePaginate(5);
        return $tasks;
    }

    public function showCompletedTasks()
    {
        $checked = new Checkbox();
        $isChecked = $checked->retrieveCheck()->toArray();
        
        
          $completedTasks = Task::whereIn('id', $isChecked)->simplePaginate(5);
          return $completedTasks; 
        
    }
    
    public function showActiveTasks()
    {
        $checked = new Checkbox();
        $isChecked = $checked->retrieveCheck()->toArray();
        
        $authenticatedUser = Auth::user();
        $user_id = $authenticatedUser->id;

        $actives =  Task::where('user_id', $user_id)->get();
        return $actives->except($isChecked);
        
    }
        

    public function updateTask($id)
    {
       $task = Task::find($id);
       return $task;
    }

    public function deleteTaskWarning($id)
    {
        return response()->json([
             'warning' => 'are you sure you want to delete this task, once deleted it can not be undone ?',
             'delete_id' => $id
        ]);
    }

    public function deleteTask($id, $request)
    {
        if($request === $id){
            Task::destroy($request);
          }
    }
}
