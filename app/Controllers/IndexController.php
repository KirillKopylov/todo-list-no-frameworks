<?php


namespace App\Controllers;


use App\Services\TaskService;

class IndexController extends AbstractController
{
    private TaskService $indexService;

    public function __construct()
    {
        parent::__construct();
        $this->indexService = new TaskService;
    }

    public function getIndex(): string
    {
        $tasks = $this->indexService->getTasks();
        return $this->render('index.html.twig', ['tasks' => $tasks->toArray()]);
    }
}