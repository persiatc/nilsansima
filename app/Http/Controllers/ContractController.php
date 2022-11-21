<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $contracts = Contract::all();
        return view('dashboards.contracts', compact('contracts'));
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
      $attachmentFile->move('storage/Contracts', $attachmentFileName);

      Contract::forceCreate([
        'onvan' => $request->onvan,
        'mozoo' => $request->mozoo,
        'peymankar' => $request->peymankar,
        'mablagh' => $request->mablagh,
        'pardakht' => $request->pardakht,
        'moddat' => $request->moddat,
        'from' => $request->from,
        'to' => $request->to,
        'tazmin' => $request->tazmin,
        'nazer' => $request->nazer,
        'description' => $request->description,
        'contractorFile' => 'storage/Contracts/' . $attachmentFileName,
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
        $contract = Contract::findOrFail($id);
        return  view('dashboards.contracts.show', compact('contract'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        return  view('dashboards.contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        if($request->file('contractorFile'))
        {
            $attachmentFile = $request->file('contractorFile');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Contracts', $attachmentFileName);

            if (file_exists(($contract->contractorFile)))
                unlink($contract->contractorFile);

            $contract->contractorFile = 'storage/Contracts/' . $attachmentFileName;

        }

        $contract->onvan = $request->onvan;
        $contract->mozoo = $request->mozoo;
        $contract->peymankar = $request->peymankar;
        $contract->mablagh = $request->mablagh;
        $contract->pardakht = $request->pardakht;
        $contract->moddat = $request->moddat;
        $contract->from = $request->from;
        $contract->to = $request->to;
        $contract->tazmin = $request->tazmin;
        $contract->nazer = $request->nazer;
        $contract->description = $request->description;

        $contract->update();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'قرارداد باموفقیت در سیستم آپدیت شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();

//        return redirect(url('contracts'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return Response
     */
    public function destroy($id)
    {
      $contract = Contract::findOrFail($id);
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
