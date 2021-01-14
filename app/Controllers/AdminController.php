<?php


namespace App\Controllers;


use App\Services\AdminService;

class AdminController extends AbstractController
{
    private AdminService $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService;
    }

    public function postCreateTasks(): string
    {
        try {
            $this->adminService->createTasks($_FILES);
            $this->redirectBack();
        } catch (\Exception $e) {
            return "Ошибка при добавлении задач: {$e->getMessage()}";
        }
    }
}