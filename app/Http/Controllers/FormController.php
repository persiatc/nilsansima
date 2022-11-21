<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests\AddFormRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        return view('dashboards.forms.index', compact('forms'));
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
    public function store(AddFormRequest $request)
    {
        if($request->file('link')){
            $attachmentFile = $request->file('link');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Forms', $attachmentFileName);
          }else{
            $attachmentFileName = "Nothing";
          }



          Form::create([
            'name' => $request->name,
            'addedByName' => \Auth::user()->name . " " . \Auth::user()->family,
            'link' => 'storage/Forms/' . $attachmentFileName,
          ]);

          \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => '  باموفقیت ثبت شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
          ));

          return redirect()->back();
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
        $Suggestion = Form::findOrFail($id);
        $Suggestion->delete();
        \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => ' با موفقیت از سیستم حذف شد.',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }
}
