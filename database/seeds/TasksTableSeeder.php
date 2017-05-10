<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task1',
            'dueDate' => '2017-05-10',
            'complete' => '1',
            'user_id' => '1',
        ]);

        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task2',
            'dueDate' => '2017-05-11',
            'complete' => '0',
            'user_id' => '1',
        ]);

        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task3',
            'dueDate' => '2017-05-12',
            'complete' => '1',
            'user_id' => '1',
        ]);

        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task4',
            'dueDate' => '2017-05-09',
            'complete' => '0',
            'user_id' => '2',
        ]);

        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task5',
            'dueDate' => '2017-05-08',
            'complete' => '1',
            'user_id' => '2',
        ]);

        Task::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'task' => 'Task6',
            'dueDate' => '2017-05-07',
            'complete' => '0',
            'user_id' => '2',
        ]);
    }
}
