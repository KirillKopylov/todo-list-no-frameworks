<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['cat_name', 'title', 'description', 'task_date'];
}