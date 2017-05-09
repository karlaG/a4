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
      * @return View
      */
     public function displayAll()
     {
         $tasks = Task::all();

         return view('home')->with([
           'tasks' => $tasks,
         ]);
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

          return view('edit')->with([
              'task' => $task->task,
              'dueDate' => $task->dueDate,
              'complete' => $task->complete,
              'id' => $task->id,
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
        //$task->complete = $request->complete;

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
        $task = new Task();
        $task = $task::find($request->id);
        $task->delete();
        return redirect('/home');
    }
}
