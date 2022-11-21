<?php

namespace App\Http\Controllers;

use App\SellerContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SellerContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $contracts = SellerContract::all();
        return view('dashboards.sellercontract', compact('contracts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      $attachmentFile = $request->file('contractorFile');
      $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
      $attachmentFile->move('storage/SellerContracts', $attachmentFileName);

      SellerContract::forceCreate([
        'onvan' => $request->onvan,
        'mozoo' => $request->mozoo,
        'tarafedovvom' => $request->tarafedovvom,
        'mablaghMahiane' => $request->mablaghMahiane,
        'mablaghSaliane' => $request->mablaghSaliane,
        'moddat' => $request->moddat,
        'from' => $request->from,
        'to' => $request->to,
        'pardakht' => $request->pardakht,
        'davar' => $request->davar,
        'description' => $request->description,
        'contractorFile' => 'storage/SellerContracts/' . $attachmentFileName,
      ]);

      \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'قرارداد باموفقیت در سیستم ثبت شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));

      return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $contract = SellerContract::findOrFail($id);
        return view('dashboards.sellercontract.show', compact('contract'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $contract = SellerContract::findOrFail($id);
        return  view('dashboards.sellercontract.edit', compact('contract'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $contract = SellerContract::findOrFail($id);
        if($request->file('contractorFile'))
        {
            $attachmentFile = $request->file('contractorFile');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/SellerContracts', $attachmentFileName);

            if (file_exists(($contract->contractorFile)))
                unlink($contract->contractorFile);

            $contract->contractorFile = 'storage/SellerContracts/' . $attachmentFileName;

        }

        $contract->onvan = $request->onvan;
        $contract->mozoo = $request->mozoo;
        $contract->tarafedovvom = $request->tarafedovvom;
        $contract->mablaghMahiane = $request->mablaghMahiane;
        $contract->mablaghSaliane = $request->mablaghSaliane;
        $contract->moddat = $request->moddat;
        $contract->from = $request->from;
        $contract->to = $request->to;
        $contract->pardakht = $request->pardakht;
        $contract->davar = $request->davar;
        $contract->description = $request->description;

        $contract->update();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'قرارداد باموفقیت در سیستم آپدیت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();

//        return redirect(url('SellersContracts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerContract  $sellerContract
     * @return Response
     */
    public function destroy($id)
    {
      $contract = SellerContract::findOrFail($id);
      $contract->delete();

      \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'قرارداد مورد نظر باموفقیت از سیستم حذف شد.',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
      ));

      return redirect()->back();

    }
}
