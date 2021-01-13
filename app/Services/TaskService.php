<?php


namespace App\Services;


use App\Models\Task;

class TaskService
{
    public function getTasks()
    {
        return Task::paginate();
    }
}