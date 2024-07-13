<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function add($isChecked):void
    {
        //add user id to checkbox also
        Checkbox::create(['task_id'=>$isChecked]);
    }

    public function remove($uncheck):void
    {
        Checkbox::where('task_id', $uncheck)->delete();
    }

    public function retrieveCheck()
    {
        //retrive user id and let start from there

      return  Checkbox::all('task_id')->pluck('task_id');
    }
}
