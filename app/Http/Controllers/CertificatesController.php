<?php

namespace App\Http\Controllers;

use App\Certificates;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificatesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $Certificates = Certificates::all();
    return view('dashboards.certifications', compact('Certificates'));
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
      $file->move('storage/Certificates', $fileName);
    }else{
      $fileName = "nothing";
    }

    if($request->file('file2')){
        $file2 = $request->file('file2');
        $fileName2 = time() . "_" . $file2->getClientOriginalName();
        $file2->move('storage/Certificates', $fileName2);
      }else{
        $fileName2 = "nothing";
      }


    Certificates::forceCreate([
      'name' => $request->name,
      'saderKonandeh' => $request->saderKonandeh,
      'dateStart' => $request->dateStart,
      'moddateEtebar' => $request->moddateEtebar,
      'dateEnd' => $request->dateEnd,
      'file' => 'storage/Certificates/' . $fileName,
      'file2' => 'storage/Certificates/' . $fileName2,

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
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function show(Certificates $certificates)
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
    $Certificate = Certificates::findOrFail($id);
    return view('dashboards.certifications.edit', compact('Certificate'));


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
    $Certificates = Certificates::findOrFail($id);

    if($request->file('file'))
    {
        $attachmentFile = $request->file('file');

        $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
        $attachmentFile->move('storage/Certificates', $attachmentFileName);

        if (file_exists(($Certificates->file)))
            unlink($Certificates->file);

        $Certificates->file = 'storage/Certificates/' . $attachmentFileName;

    }

    if($request->file('file2'))
    {
        $attachmentFile2 = $request->file('file2');

        $attachmentFileName2 = time() . "_" . $attachmentFile2->getClientOriginalName();
        $attachmentFile2->move('storage/Certificates', $attachmentFileName2);

        if (file_exists(($Certificates->file2)))
            unlink($Certificates->file2);

        $Certificates->file2 = 'storage/Certificates/' . $attachmentFileName2;

    }

    $Certificates->name = $request->name;
    $Certificates->saderKonandeh = $request->saderKonandeh;
    $Certificates->dateStart = $request->dateStart;
    $Certificates->moddateEtebar = $request->moddateEtebar;
    $Certificates->dateEnd = $request->dateEnd;

    $Certificates->update();

    \Session::flash('updateUser', array(
        'flash_title' => 'انجام شد',
        'flash_message' => 'رتبه یا گواهینامه باموفقیت  آپدیت شد',
        'flash_level' => 'success',
        'flash_button' => 'بستن'
    ));
    return redirect()->back();

}

/**
* Remove the specified resource from storage.
*
* @param  \App\Certificates  $certificates
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $Certificates = Certificates::findOrFail($id);
  $Certificates->delete();

  \Session::flash('updateUser', array(
    'flash_title' => 'انجام شد',
    'flash_message' => 'گواهینامه موردنظر باموفقیت حذف شد.',
    'flash_level' => 'success',
    'flash_button' => 'بستن'
  ));

  return redirect()->back();

}
}
