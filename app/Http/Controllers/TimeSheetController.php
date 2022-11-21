<?php

namespace App\Http\Controllers;

use App\TimeSheet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Requests\AddTimeSheetRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class TimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheets = TimeSheet::select('id', 'created_at', 'description', 'assignment', 'kaarfarma', 'projectName' , 'startHour', 'endHour', 'minutes', 'result', 'holdpoint', 'attach1', 'attach2')
        ->where('user_id', \Auth::user()->id)->get();

        if(\Auth::user()->email === 'rahmani@persiatc.com'){
            $personnelTimesheets = $timesheets = TimeSheet::select('id', 'created_at', 'projectName', 'assignment', 'startHour', 'endHour')
            // ->oldest()
            ->orderBy('id', 'desc')
            ->limit(300)
            ->get();
        }elseif(\Auth::user()->email === 'torkaman@persiatc.com'){
            $personnelTimesheets = DB::table('time_sheets')->where('user_id', 25)->orWhere('user_id', 23)->get();
        }elseif(\Auth::user()->email === 'khanbeigi@persiatc.com'){
            $personnelTimesheets = DB::table('time_sheets')->where('user_id', 20)->orWhere('user_id', 32)->orWhere('user_id', 30)->orWhere('user_id', 26)->get();
        }elseif(\Auth::user()->email === 'tavakoli@persiatc.com'){
            $personnelTimesheets = DB::table('time_sheets')->where('user_id', 39)->orWhere('user_id', 33)->orWhere('user_id', 28)->orWhere('user_id', 31)->orWhere('user_id', 22)->orWhere('user_id', 43)->orWhere('user_id', 19)->get();
        }else{
            $personnelTimesheets = '';
        }

        return view('dashboards.timesheet', compact('timesheets', 'personnelTimesheets'));
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
    public function store(AddTimeSheetRequest $request)
    {
        if ($request->file('attach1'))
        {
            $attach1 = $this->uploadFile($request->file('attach1'));
        }else{
            $attach1 = 'nothing';
        }
        if ($request->file('attach2'))
        {
            $attach2 = $this->uploadFile($request->file('attach2'));
        }else{
            $attach2 = 'nothing';
        }


        $tdl = TimeSheet::create([
            'description' => $request->description,
            'assignment' => $request->assignment,
            'kaarfarma' => $request->kaarfarma,
            'projectName' => $request->projectName,
            'startHour' => $request->startHour,
            'endHour' => $request->endHour,
            'minutes' => $request->minutes,
            'holdpoint' => $request->holdpoint,
            'result' => $request->result,
            'attach1' => $attach1,
            'attach2' => $attach2,
            'tdl_id' => $request->tdl_id,
            'user_id' => \Auth::user()->id,
        ]);


        \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'فعالیت با موفقیت به سیستم اضافه شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));
      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Factory|Application|View
     */
    public function show($id)
    {
        $TimeSheet = TimeSheet::find($id);
        return view('dashboards.timesheet.show', compact('TimeSheet'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSheet $timeSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSheet  $timeSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $TimeSheet = TimeSheet::find($id);
      if($TimeSheet->user_id == \Auth::user()->id){
        $TimeSheet = TimeSheet::findOrFail($id);
        $TimeSheet->delete();

        \Session::flash('updateUser', array(
          'flash_title' => 'حذف شد',
          'flash_message' => 'فعالیت با موفقیت حذف شد',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        return redirect()->back();
      }else{
        return redirect()->back();
      }



    }
}
