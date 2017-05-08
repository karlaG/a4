<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

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
     * Show the application main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        return view('main');
    }

    /**
     * Show the application dashboard.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
      return view('home');
    }
}
