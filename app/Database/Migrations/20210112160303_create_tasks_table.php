<?php
declare(strict_types=1);

use App\Database\Migrations\MigrationBase;

final class CreateTasksTable extends MigrationBase
{
    public function up()
    {
        $this->schema->create('tasks', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cat_name');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_done')->default(false);
            $table->dateTime('task_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->drop('tasks');
    }
}
