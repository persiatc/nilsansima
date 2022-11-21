<?php

namespace App\Http\Controllers;

use App\FinancialGuarantee;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;
use App\Http\Requests\AddFinancialGuaranteeRequest;

class FinancialGuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = FinancialGuarantee::all();
        return view('dashboards.financialGuarantee.financialGuarantee', compact('archives'));
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
    public function store(AddFinancialGuaranteeRequest $request)
    {

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('storage/FinancialGuarantee', $fileName);
        }else{
            $fileName = "nothing";
        }
        if($request->end_date) {
            $end_date = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->end_date);
        } else {
            $end_date = null;
        }

        $phoneBook = FinancialGuarantee::forceCreate([
            'type' => $request->type,
            'subject' => $request->subject,
            'status' => $request->status,
            'active_status' => $request->active_status,
            'validity_duration' => $request->validity_duration,

            'name_of_issuing_bank' => $request->name_of_issuing_bank,
            'beneficiary_name' => $request->beneficiary_name,
            'price' => $request->price,
            'image' => 'storage/FinancialGuarantee/' .$fileName,
            'end_date' => $end_date,

        ]);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'ضمانت نامه مالی باموفقیت در سیستم ثبت شد',
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
        $phoneBook = FinancialGuarantee::findOrFail($id);



        if($request->file('image'))
        {
            $attachmentFile = $request->file('image');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/FinancialGuarantee', $attachmentFileName);

            if (file_exists(($phoneBook->image)))
                unlink($phoneBook->image);

            $phoneBook->image = 'storage/FinancialGuarantee/' . $attachmentFileName;

        }

        $phoneBook->name_of_issuing_bank = $request->name_of_issuing_bank;
        $phoneBook->beneficiary_name = $request->beneficiary_name;
        $phoneBook->price = $request->price;
        $phoneBook->end_date = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->end_date);


        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'ضمانت نامه مالی باموفقیت در سیستم آپدیت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }

    public function updateEndDate(Request $request, $id)
    {

        $phoneBook = FinancialGuarantee::findOrFail($id);
        $phoneBook->end_date = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->end_date);
        $phoneBook->update();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'ضمانت نامه مالی باموفقیت در سیستم تمدید شد',
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
        if (\Auth::user()->id == 6 OR \Auth::user()->id == 48 OR \Auth::user()->id == 23){

            $contract = FinancialGuarantee::findOrFail($id);
            $contract->delete();

            \Session::flash('updateUser', array(
                'flash_title' => 'انجام شد',
                'flash_message' => '  نامه مالی مورد نظر باموفقیت از سیستم حذف شد.',
                'flash_level' => 'success',
                'flash_button' => 'بستن'
            ));
        } else{
            \Session::flash('updateUser', array(
                'flash_title' => 'خطا',
                'flash_message' => 'شما دسترسی لازم را ندارید',
                'flash_level' => 'error',
                'flash_button' => 'بستن'
            ));
        }

        return redirect()->back();
    }
}
