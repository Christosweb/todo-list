<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkbox;


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
}