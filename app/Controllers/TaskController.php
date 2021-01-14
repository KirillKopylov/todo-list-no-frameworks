<?php


namespace App\Controllers;


use App\Services\TaskService;

class TaskController extends AbstractController
{
    private TaskService $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService;
    }

    public function getIndex(): string
    {
        $tasks = $this->taskService->getTasks();
        return $this->render('index.html.twig', ['tasks' => $tasks]);
    }

    public function getTasks($id): string
    {
        $task = $this->taskService->getTask($id);
        return $this->render('task.html.twig', ['task' => $task]);
    }

    public function getSetAsDone($id): void
    {
        $this->taskService->setAsDone($id);
        $this->redirectBack();
    }
}