<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use App\Task;

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

  public function createTask(Request $request) {
      $this->validate($request, [
        'message' => 'required|max:140',
        'dueDate' => 'required|date',
        'done' => 'required'
      ]);

      $task = new Task;

      $task->message = $request->message;
      $task->dueDate = $request->dueDate;
      $task->done = $request->done;

      $task->save();

      //$request->user()->tasks()->create([
      //  'name' => $request->name,
    //]);
    }
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
}
