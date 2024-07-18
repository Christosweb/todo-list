<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * this model class add, remove and retrieve user_id and task_id to/from checkboxes database.
 * it is to retrieve the active and completed task.
 * this method is called when user check and uncheck the checkboxes.
 * @param $user_id,  $task_id
 * 
 */
class Checkbox extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function add($isChecked):void
    {
        $user = Auth::user();
    
        Checkbox::create(['task_id'=>$isChecked, 'user_id'=>$user->id]);
    }

    public function remove($uncheck):void
    {
        Checkbox::where('task_id', $uncheck)->delete();
    }

    public function retrieveCheck()
    {
        
        $user = Auth::user();
    //   return  Checkbox::all('task_id')->pluck('task_id'); //initial
      return  Checkbox::where('user_id', $user->id )->pluck('task_id'); //modification
    }
}
