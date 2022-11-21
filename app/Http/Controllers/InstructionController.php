<?php

namespace App\Http\Controllers;

use App\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives = Instruction::all();
        return view('dashboards.Instructions', compact('archives'));

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
        if($request->file('file')){
            $file = $request->file('file');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('storage/Instructions', $fileName);
        }else{
            $fileName = "nothing";
        }

        $phoneBook = Instruction::forceCreate([
            'title' => $request->title,
            'file' => 'storage/Instructions/' .$fileName,
            'user_id' => \Auth::user()->id,

        ]);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'آیین نامه باموفقیت در سیستم ثبت شد',
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
        $phoneBook = Instruction::findOrFail($id);


        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Instructions', $attachmentFileName);

            if (file_exists(($phoneBook->file)))
                unlink($phoneBook->file);

            $phoneBook->file = 'storage/Instructions/' . $attachmentFileName;

        }

        $phoneBook->title = $request->title;
        $phoneBook->user_id = \Auth::user()->id;

        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'آیین نامه باموفقیت در سیستم آپدیت شد',
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
        $contract = Instruction::findOrFail($id);
        $contract->delete();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'آیین نامه مورد نظر باموفقیت از سیستم حذف شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }
}
