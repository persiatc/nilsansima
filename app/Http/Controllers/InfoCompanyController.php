<?php

namespace App\Http\Controllers;

use App\InfoCompany;
use Illuminate\Http\Request;

class InfoCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InfoCompany = InfoCompany::first();
        return view('dashboards.info.infoCompany', compact('InfoCompany'));
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
    public function update(Request $request)
    {
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('storage/info', $fileName);
        }else{
            $fileName = "nothing";
        }

        $tender = InfoCompany::find($request->id);
        $tender->user_id = \Auth::user()->id;
        $tender->address = $request->address;
        $tender->code_posti = $request->code_posti;

        $tender->phone = $request->phone;
        $tender->fax = $request->fax;
        $tender->address_khoram = $request->address_khoram;
        $tender->code_posti_khoram = $request->code_posti_khoram;
        $tender->phone_khoram = $request->phone_khoram;
        $tender->shomare_sabt = $request->shomare_sabt;
        $tender->shomare_hesab_tejarat = $request->shomare_hesab_tejarat;
        $tender->shomare_shaba = $request->shomare_shaba;
        $tender->code_eqtesadi = $request->code_eqtesadi;
        $tender->email = $request->email;
        $tender->website = $request->website;
        $tender->shenase_meli = $request->shenase_meli;
        $tender->file = 'storage/info/' .$fileName;


        $tender->save();


        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت در سیستم آپدیت شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
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
