<?php

namespace App\Http\Controllers;


use App\Commission;
use App\PurchaseRequest;
use App\PaymentOrderForm;
use App\CommissionPartial;
use App\PurchaseRequestForm;
use Illuminate\Http\Request;
use App\Http\Requests\CommissionPartialRequest;

class CommissionPartialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commissions = CommissionPartial::all();
        return view('dashboards.Commission.CommissionPartial', compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        // $PurchaseRequest = PurchaseRequest::find($id);
        return view('dashboards.Commission.CommissionPartialCreate', compact('id', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommissionPartialRequest $request)
    {

        if($request->file('fileestelambaha1')){
            $file = $request->file('fileestelambaha1');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('storage/CommissionPartial', $fileName);
          }else{
            $fileName = "nothing";
          }

          if($request->file('fileestelambaha2')){
              $file2 = $request->file('fileestelambaha2');
              $fileName2 = time() . "_" . $file2->getClientOriginalName();
              $file2->move('storage/CommissionPartial', $fileName2);
            }else{
              $fileName2 = "nothing";
            }

            if($request->file('fileestelambaha3')){
                $file3 = $request->file('fileestelambaha3');
                $fileName3 = time() . "_" . $file3->getClientOriginalName();
                $file3->move('storage/CommissionPartial', $fileName3);
              }else{
                $fileName3 = "nothing";
              }



        $CommissionPartial = CommissionPartial::create([
            'mozoo' => $request->mozoo,
            'darkhastkonande' => $request->darkhastkonande,
            'arzeshmoamele' => $request->arzeshmoamele,
            'tedadestelambaha' => $request->tedadestelambaha,
            'user_id' => \Auth::user()->id,
            'fileestelambaha1' => 'storage/CommissionPartial/' . $fileName,
            'fileestelambaha2' => 'storage/CommissionPartial/' . $fileName2,
            'fileestelambaha3' => 'storage/CommissionPartial/' . $fileName3,
            // 'typekala' => $request->typekala,
            'datesabt' => $request->datesabt,
            'purchase_requests_id' => $request->purchase_requests_id,
            // 'mahaltahvil' => $request->mahaltahvil,
            // 'hazinehaml' => $request->hazinehaml,
            // 'garanti' => $request->garanti,
            // 'khadamatpasazforosh' => $request->khadamatpasazforosh,
            // 'email_status' => $request->email_status,
            // 'status_confirmation' => 'بررسی نشده',
        ]);


        PaymentOrderForm::create([
            'project_manager' => $request->project_manager,
            'amount' => $request->amount,
            'to_buy' => $request->to_buy,
            'user_id' => \Auth::user()->id,
            'PaymentOrderFormable_id' => $CommissionPartial->id,
            'PaymentOrderFormable_type' => CommissionPartial::class,
            'status' => 'درانتظارتایید مدیربخش',
        ]);



        $total = 0;
        $rows = $request->input('row');
        foreach ($rows as $row)
        {

            $total_price = $row['unit_price'] * $row['number'];
            $total += $total_price;

            $objects[] = [
                'description' => $row['description'],
                'number' => $row['number'],
                'Project_unit_manager_approval' => \Auth::user()->id,
                'status' => 'درانتظارتایید انباردار',
                'unit' => $row['unit'],
                'cost_center' => $row['cost_center'],
                'Date_required' => $row['Date_required'],
                'unit_price' => $row['unit_price'],
                'Explanation' => $row['Explanation'],
                'total_price' => $total_price,
                'user_id' => \Auth::user()->id,
                'PurchaseRequestFormable_id' => $CommissionPartial->id,
                'PurchaseRequestFormable_type' => CommissionPartial::class,
            ];
        }


        PurchaseRequestForm::insert($objects);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->route('CommissionPartial');

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



        $tdl = CommissionPartial::where('id', $request->id)
            ->update([
                'mozoo' => $request->mozoo,
                'darkhastkonande' => $request->darkhastkonande,
                'arzeshmoamele' => $request->arzeshmoamele,
                'tedadestelambaha' => $request->tedadestelambaha,
                'user_id' => \Auth::user()->id,
                'typekala' => $request->typekala,
                'datesabt' => $request->datesabt,
                'mahaltahvil' => $request->mahaltahvil,
                'hazinehaml' => $request->hazinehaml,
                'garanti' => $request->garanti,
                'khadamatpasazforosh' => $request->khadamatpasazforosh,
                'email_status' => $request->email_status,
            ]);

            if ($request->file('fileestelambaha')) {
                $attachmentFile = $request->file('fileestelambaha');
                $fileestelambaha = time() . "_" . $attachmentFile->getClientOriginalName();
                $attachmentFile->move('storage/CommissionPartial ', $fileestelambaha);
                $tdl->fileestelambaha = 'storage/CommissionPartial/' . $fileestelambaha;
                $tdl->save();
            }

            \Session::flash('updateUser', array(
                'flash_title' => 'انجام شد',
                'flash_message' => ' با موفقیت بروز شد.',
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
    public function editPurchaseRequestFormsStatus($type, $id)
    {

       $PurchaseRequest =  PurchaseRequestForm::where('PurchaseRequestFormable_id', $id)
       ->where('PurchaseRequestFormable_type', $type)
       ->first();

       return view('dashboards.Commission.updatePurchaseRequestFormsStatus', compact('PurchaseRequest'));
    }

    public function updatePurchaseRequestFormsStatus(Request $request)
    {
        $tdl = PurchaseRequestForm::where('id', $request->id)
        ->update([
            $request->field => 'تایید شد',
        ]);
        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت بروز شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();


    }

}