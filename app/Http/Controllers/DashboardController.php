<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tdl;
use App\Baner;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function login()
     {

       return view('auth.login');

     }


    public function index()
    {
      $users = User::where('name', '!=', 'delete user')->get();

      $baners = Baner::all();

      $tdlsAssignedToThisUser = Tdl::where('user_id', '=', \Auth::user()->id)->get();
      $tdlsAssignedToOther = Tdl::where('assignerId', '=', \Auth::user()->id)->with('user')->get();


      $chart['ytoMotevaghef'] = Tdl::where('assignerId', '=', \Auth::user()->id)->where('status', 'متوقف')->count();
      $chart['ytoAnjamshode'] = Tdl::where('assignerId', '=', \Auth::user()->id)->where('status', 'انجام شده')->count();
      $chart['ytoDarhaaleanjam'] = Tdl::where('assignerId', '=', \Auth::user()->id)->where('status', 'درحال انجام')->count();
      $chart['ytoBarresinashode'] = Tdl::where('assignerId', '=', \Auth::user()->id)->where('status', 'بررسی نشده')->count();

      $chart['otuMotevaghef'] = Tdl::where('user_id', '=', \Auth::user()->id)->where('status', 'متوقف')->count();
      $chart['otuAnjamshode'] = Tdl::where('user_id', '=', \Auth::user()->id)->where('status', 'انجام شده')->count();
      $chart['otuDarhaaleanjam'] = Tdl::where('user_id', '=', \Auth::user()->id)->where('status', 'درحال انجام')->count();
      $chart['otuBarresinashode'] = Tdl::where('assignerId', '=', \Auth::user()->id)->where('status', 'بررسی نشده')->count();


      //Boxes
      $monthNumber = $date = jdate('now')->format('%m');
      $dayNumber = $date = jdate('now')->format('%d');
      $monthNumberStr = '%' . "$monthNumber" . '%';
      $dayNumberStr = '%' . '%' . "$dayNumber";
      $box['1'] = Tdl::where("jDate", "like", "$dayNumberStr")->where('user_id', \Auth::user()->id)->count('id');
      $box['2'] = Tdl::where("jDate", "like", "$dayNumberStr")->where('user_id', \Auth::user()->id)->where('status', 'انجام شده')->count('id');
      $box['5'] = Tdl::where("jDate", "like", "$monthNumberStr")->where('user_id', \Auth::user()->id)->count('id');
      $box['6'] = Tdl::where("jDate", "like", "$monthNumberStr")->where('user_id', \Auth::user()->id)->where('status', 'انجام شده')->count('id');
      $box['7'] = Tdl::where("jDate", "like", "$monthNumberStr")->where('user_id', \Auth::user()->id)->where('status', 'بررسی نشده')->count('id');

      return view('dashboard', compact('baners','tdlsAssignedToThisUser', 'tdlsAssignedToOther', 'users', 'chart', 'box'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
