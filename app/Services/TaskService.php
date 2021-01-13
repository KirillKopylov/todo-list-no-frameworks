<?php


namespace App\Services;


use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

class TaskService
{
    public function getTasks(): LengthAwarePaginator
    {
        return Task::where('is_done', false)->paginate();
    }

    public function getTask($id): Task
    {
        $task = Task::find($id);
        if (is_null($task)) {
            throw new HttpRouteNotFoundException;
        }
        return Task::find($id);
    }

    public function setAsDone($id): void
    {
        $task = Task::find($id);
        if (is_null($task)) {
            throw new HttpRouteNotFoundException;
        }
        if (!$task->is_done) {
            $task->is_done = true;
            $task->save();
        }
    }
}