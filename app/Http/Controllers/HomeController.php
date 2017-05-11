<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Tag;

class HomeController extends Controller
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
     * Show the landing page.
     *
     * @param  Request  $request
     * @return View
     */
    public function main()
    {
        return view("main");
    }

    /**
     * Show the application dashboard.
     *
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request)
    {
      $user = $request->user();

      if($user) {
        $tasks = Task::where('user_id', '=', $user->id)->get();

        $tagsForCheckboxes = Tag::getTagsForCheckboxes();

        return view('home')->with([
          'tasks' => $tasks,
          'tagsForCheckboxes' => $tagsForCheckboxes,
        ]);
      }
      else {
         $tasks = [];
      }
    }
}
