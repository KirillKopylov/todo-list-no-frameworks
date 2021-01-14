<?php


namespace App\Services;


use App\Models\Task;
use Carbon\Carbon;
use App\Services\Exceptions\TaskException;

class AdminService
{
    public function createTasks(array $files)
    {
        if (isset($files['tasks'])) {
            $upload = $files['tasks'];
            if ($upload['error']) {
                throw new TaskException("Ошибка при загрузке файла: {$upload['error']}.");
            }
            if ($upload['type'] != 'text/plain') {
                throw new TaskException('Загруженный файл не является plain text.');
            }
            $tasks = explode(PHP_EOL, file_get_contents($upload['tmp_name']));
            foreach ($tasks as $task) {
                if (!empty($task)) {
                    $explodedTask = explode(';', $task);
                    $description = trim($explodedTask[1]);
                    $catNameDateTitle = explode(' ', $explodedTask[0]);
                    $catName = $catNameDateTitle[0];
                    $date = $catNameDateTitle[1];
                    $dateString = Carbon::parse($date)->toDateTimeString();
                    $title = implode(' ', array_slice($catNameDateTitle, 2));
                    $task = [
                        'cat_name' => $catName,
                        'title' => $title,
                        'description' => $description,
                        'task_date' => $dateString
                    ];
                    Task::updateOrCreate($task, $task);
                }
            }
        } else {
            throw new TaskException('Отсутствует параметр "tasks".');
        }
    }
}