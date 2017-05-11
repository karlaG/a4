<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Tag;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
          'task' => 'required|max:140',
          'dueDate' => 'required|date',
        ]);

        $task = new Task;

        $task->task = $request->task;
        $task->dueDate = $request->dueDate;
        $task->user_id = $request->user()->id;

        if ($request->complete == null) {
            $task->complete = 1;
        }
        else {
            $task->complete = 0;
        }

        $task->save();

        $tags = ($request->tags) ?: [];
        $task->tags()->sync($tags);
        $task->save();

        return redirect('/home');
    }

    /**
     * Edit a task.
     *
     * @param  Request  $request
     * @return View
     */
    public function edit(Request $request)
    {
        $task = Task::find($request->id);

        $tagsForCheckboxes = Tag::getTagsForCheckboxes();
        $tagsForThisTask = [];
        foreach($task->tags as $tag) {
            $tagsForThisTask[] = $tag->name;
        }
        
        return view('edit')->with([
            'task' => $task->task,
            'dueDate' => $task->dueDate,
            'complete' => $task->complete,
            'id' => $task->id,
            'tagsForCheckboxes' => $tagsForCheckboxes,
            'tagsForThisTask'=> $tagsForThisTask,
        ]);
    }

    /**
      * Edit a task.
      *
      * @param  Request  $request
      * @return Response
      */
    public function saveEdit(Request $request)
    {
      $this->validate($request, [
        'task' => 'required|max:140',
        'dueDate' => 'required|date',
      ]);

      $task = Task::find($request->id);

      $task->task = $request->task;
      $task->dueDate = $request->dueDate;
      $task->user_id = $request->user()->id;

      if ($request->complete == null) {
          $task->complete = 1;
      }
      else {
          $task->complete = 0;
      }

      $tags = ($request->tags) ?: [];
      $task->tags()->sync($tags);
      $task->save();

      return redirect('/home');
    }

    /**
     * Destroy a task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $task = Task::find($request->id);
        $task->tags()->detach();
        $task->delete();
        return redirect('/home');
    }
}
