<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use App\Http\Requests\AddPurchaseRequest;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $contracts = PurchaseRequest::where('invoice_id', $id)->get();
        return view('dashboards.PurchaseRequest.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::findOrFail($id);
        return  view('dashboards.PurchaseRequest.create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPurchaseRequest $request)
    {
        $attachmentFile = $request->file('contractorFile');
        $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
        $attachmentFile->move('storage/PurchaseRequest', $attachmentFileName);

        $request = PurchaseRequest::forceCreate([
          'onvan' => $request->onvan,
          'description' => $request->description,
          'peymankar' => $request->peymankar,
          'mablagh' => $request->mablagh,
          'pardakht' => $request->pardakht,
          'moddat' => $request->moddat,
          'status' => "بخش کمیسیون",

          'from' => $request->from,
          'to' => $request->to,
          'invoice_id' => $request->invoice_id,


          'contractorFile' => 'storage/PurchaseRequest/' . $attachmentFileName,
        ]);

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => 'درخواست خرید جدید باموفقیت در سیستم ثبت شد معامله مربوطه را ثبت کنید!',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
        ));
        // if($request->mablagh <= 100000000) {
        //     return redirect()->route('CommissionPartial.create', $request->id);
        // }

        // return redirect()->back();
        return redirect(route('invoices'));
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
        $Suggestion = PurchaseRequest::findOrFail($id);
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