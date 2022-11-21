<?php

namespace App\Http\Controllers;

use App\Dokumentation;
use Illuminate\Http\Request;

class DokumentationController extends Controller
{
     /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $Dokumentation = Dokumentation::orderBy('name')->get();
    return view('dashboards.Dokumentation', compact('Dokumentation'));
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
  public function store(Request $request)
  {

    if($request->file('file')){
      $file = $request->file('file');
      $fileName = time() . "_" . $file->getClientOriginalName();
      $file->move('storage/Dokumentation', $fileName);
    }else{
      $fileName = "nothing";
    }


    Dokumentation::forceCreate([
      'name' => $request->name,
      'saderKonandeh' => $request->saderKonandeh,
      'dateStart' => $request->dateStart,
      'moddateEtebar' => $request->moddateEtebar,
      'dateEnd' => $request->dateEnd,
      'file' => 'storage/Dokumentation/' . $fileName,
    ]
  );


  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'گواهینامه به سیستم اضافه شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));
  return redirect()->back();

}

/**
* Display the specified resource.
*
* @param  \App\Dokumentation  $Dokumentation
* @return \Illuminate\Http\Response
*/
public function show(Dokumentation $Dokumentation)
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
    $Certificate = Dokumentation::findOrFail($id);
    return view('dashboards.Dokumentation.edit', compact('Certificate'));


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
    $Dokumentation = Dokumentation::findOrFail($id);

    if($request->file('file'))
    {
        $attachmentFile = $request->file('file');

        $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
        $attachmentFile->move('storage/Dokumentation', $attachmentFileName);

        if (file_exists(($Dokumentation->contractorFile)))
            unlink($Dokumentation->contractorFile);

        $Dokumentation->file = 'storage/Dokumentation/' . $attachmentFileName;

    }

    $Dokumentation->name = $request->name;
    $Dokumentation->saderKonandeh = $request->saderKonandeh;
    $Dokumentation->dateStart = $request->dateStart;
    $Dokumentation->moddateEtebar = $request->moddateEtebar;
    $Dokumentation->dateEnd = $request->dateEnd;

    $Dokumentation->update();

    \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'سند   باموفقیت  آپدیت شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
    ));
    return redirect()->back();

}

/**
* Remove the specified resource from storage.
*
* @param  \App\Dokumentation  $Dokumentation
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $Dokumentation = Dokumentation::findOrFail($id);
  $Dokumentation->delete();

  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'سند موردنظر باموفقیت حذف شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));

  return redirect()->back();

}
}
