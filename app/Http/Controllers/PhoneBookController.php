<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneBook;
use App\Http\Requests\AddPhoneRequest;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneBooks = PhoneBook::all();
        return view('dashboards.phoneBooks', compact('phoneBooks'));

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
    public function store(AddPhoneRequest $request)
    {

        $phoneBook = PhoneBook::forceCreate([
            'fax' => $request->fax,
            'email' => $request->email,
            'address' => $request->address,
            'personName' => $request->personName,
            'company' => $request->company,
            'type_company' => $request->type_company,

            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'phone3' => $request->phone3,

        ]);



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'تلفن باموفقیت در سیستم ثبت شد',
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
        $phoneBook = PhoneBook::findOrFail($id);


        $phoneBook->fax = $request->fax;
        $phoneBook->email = $request->email;
        $phoneBook->address = $request->address;
        $phoneBook->personName = $request->personName;
        $phoneBook->company = $request->company;
        $phoneBook->phone1 = $request->phone1;
        $phoneBook->phone2 = $request->phone2;
        $phoneBook->phone3 = $request->phone3;
        $phoneBook->type_company = $request->type_company;

        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'تلفن باموفقیت در سیستم آپدیت شد',
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
        $contract = PhoneBook::findOrFail($id);
        $contract->delete();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'تلفن مورد نظر باموفقیت از سیستم حذف شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }
}
