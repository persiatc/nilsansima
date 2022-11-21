<?php

namespace App\Http\Controllers;

use App\Confirm;
use App\CommissionPartial;
use Illuminate\Http\Request;
use App\Http\Requests\ConfirmRequest;

class ConfirmController extends Controller
{
    public function index($type, $id)
    {
        $confirms = Confirm::where('confirmable_id', $id)->where('confirmable_type', $type)->get();
        $commission = $type::find($id);
        // dd($commission);
        return view('dashboards.Commission.confirmList', compact('confirms', 'commission'));

    }
    public function create($type, $id)
    {
        return view('dashboards.Commission.storeIdeaComision', compact('type', 'id'));
    }
    public function store(ConfirmRequest $request)
    {

        Confirm::forceCreate([
            'confirmable_type' => $request->confirmable_type,
            'confirmable_id' => $request->confirmable_id,
            'status' => $request->status,
            'description' => $request->description,
            'user_id' => \Auth::user()->id,

          ]);

          \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' باموفقیت در سیستم ثبت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
          ));

          return redirect()->back();
    }
}
