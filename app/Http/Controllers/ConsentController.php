<?php

namespace App\Http\Controllers;

use App\Consent;
use Illuminate\Http\Request;
use App\Http\Requests\ConsentRequest;
use Illuminate\Http\RedirectResponse;

class ConsentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      $consents = Consent::all();
      return view('dashboards.consents', compact('consents'));
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
    * @param Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(ConsentRequest $request)
    {

      if($request->file('file')){
        $file = $request->file('file');
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move('storage/Consent', $fileName);
      }else{
        $fileName = "nothing";
      }



      Consent::forceCreate([
        'exporterName' => $request->exporterName,
        'subject' => $request->subject,
        'user_id' => auth()->user()->id,
        'issueDate' => \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/n/j', $request->issueDate),
        'file' => 'storage/Consent/' . $fileName,

      ]
    );


    \Session::flash('updateUser', array(
      'flash_title' => 'انجام شد',
      'flash_message' => ' به سیستم اضافه شد.',
      'flash_level' => 'success',
      'flash_button' => 'بستن'
    ));
    return redirect()->back();

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Consent  $certificates
  * @return \Illuminate\Http\Response
  */
  public function show(Consent $certificates)
  {
    //
  }

      /**
       * Show the form for editing the specified resource.
       *
       * @param $id
       * @return Factory|Application|View
       */
  public function edit($id)
  {
    //   $consent = Consent::findOrFail($id);
    //   return view('dashboards.certifications.edit', compact('consent'));


  }

      /**
       * Update the specified resource in storage.
       *
       * @param Request $request
       * @param $id
       * @return RedirectResponse
       */
  public function update(Request $request, $id): RedirectResponse
  {
      $Consent = Consent::findOrFail($id);

      if($request->file('file'))
      {
          $attachmentFile = $request->file('file');

          $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
          $attachmentFile->move('storage/Consent', $attachmentFileName);

          if (file_exists(($Consent->file)))
              unlink($Consent->file);

          $Consent->file = 'storage/Consent/' . $attachmentFileName;

      }

      if($request->file('file2'))
      {
          $attachmentFile2 = $request->file('file2');

          $attachmentFileName2 = time() . "_" . $attachmentFile2->getClientOriginalName();
          $attachmentFile2->move('storage/Consent', $attachmentFileName2);

          if (file_exists(($Consent->file2)))
              unlink($Consent->file2);

          $Consent->file2 = 'storage/Consent/' . $attachmentFileName2;

      }

      $Consent->name = $request->name;
      $Consent->saderKonandeh = $request->saderKonandeh;
      $Consent->dateStart = $request->dateStart;
      $Consent->moddateEtebar = $request->moddateEtebar;
      $Consent->dateEnd = $request->dateEnd;

      $Consent->update();

      \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => '   باموفقیت  آپدیت شد',
          'flash_level' => 'success',
          'flash_button' => 'بستن'
      ));
      return redirect()->back();

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Consent  $certificates
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $Consent = Consent::findOrFail($id);
    $Consent->delete();

    \Session::flash('updateUser', array(
      'flash_title' => 'انجام شد',
      'flash_message' => '  باموفقیت حذف شد.',
      'flash_level' => 'success',
      'flash_button' => 'بستن'
    ));

    return redirect()->back();

  }
  }
