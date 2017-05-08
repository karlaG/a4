<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;

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
        $task->complete = $request->complete;

        $task->save();

        return redirect('/home');
    }

    /**
      * Display all tasks.
      *
      * @param  Request  $request
      * @return Response
      */
     public function displayAll(Request $request)
     {
         $task = new Task();
         $tasks = $task::all();

         return view('home')->with([
           'tasks' => $tasks,
         ]);
     }

     /**
       * Edit a task.
       *
       * @param  Request  $request
       * @return Response
       */
      public function edit(Request $request)
      {
          $task = new Task();
          return redirect('/home');
      }

    /**
     * Destroy a task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/home');
    }
}
