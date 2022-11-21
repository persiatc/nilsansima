<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\InquiryDetail;
use Illuminate\Http\Request;
use App\Http\Requests\InquiryRequest;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InquiryPersonal = Inquiry::where('user_id', \Auth::user()->id)->get();
        $InquiryAll = Inquiry::all();
        return view('dashboards.inquiry.index', compact('InquiryAll', 'InquiryPersonal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $InquiryDetailes = InquiryDetail::where('inquiry_id', $id)->get();
        // dd($InquiryDetailes);
        return view('dashboards.inquiry.detail', compact('InquiryDetailes', 'id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquiryRequest $request)
    {
        if ($request->file('file')) {
            $attachmentFile = $request->file('file');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/InquiryAttachments', $attachmentFileName);
        } else {
            $attachmentFileName = "nothing";
        }


            $Inquiry =  Inquiry::create([
                'title' => $request->title,
                'nameproje' => $request->nameproje,
                'namekarfarma' => $request->namekarfarma,
                'nahveerja' => $request->nahveerja,
                'user_id' => \Auth::user()->id,
            ]);

            $InquiryDetail =  InquiryDetail::create([
                'inquiry_id' => $Inquiry->id,
                'description' => $request->description,
                'file' => 'storage/InquiryAttachments/' . $attachmentFileName,
            ]);


            \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));
        return redirect()->back();
    }

    public function storeDetail(Request $request)
    {
        if ($request->file('file')) {
            $attachmentFile = $request->file('file');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/InquiryAttachments', $attachmentFileName);
        } else {
            $attachmentFileName = "nothing";
        }

            $InquiryDetail =  InquiryDetail::create([
                'inquiry_id' => $request->inquiry_id,
                'description' => $request->description,
                'file' => 'storage/InquiryAttachments/' . $attachmentFileName,
            ]);


            \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => ' با موفقیت به سیستم اضافه شد',
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
        //
    }
}
