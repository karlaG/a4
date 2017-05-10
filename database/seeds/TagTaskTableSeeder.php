<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Tag;

class TagTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            'Task2' => ['urgent'],
            'Task4' => ['kids', 'family'],
            'Task6' => ['home', 'errands', 'work'],
        ];

        foreach($tasks as $task => $tags) {
            $task = Task::where('task', 'LIKE', $task)->first();

            foreach($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();
                $task->tags()->save($tag);
            }
        }
    }
}
