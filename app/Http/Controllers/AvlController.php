<?php

namespace App\Http\Controllers;

use App\Avl;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avls = Avl::all();
        return view('dashboards.avl', compact('avls'));
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
        Avl::create($request->all());


        \Session::flash('updateUser', array(
          'flash_title' => 'Seccessfully',
          'flash_message' => 'Contract Created Successfully',
          'flash_level' => 'success',
          'flash_button' => 'Okay'
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
        $avl = Avl::findOrFail($id);
        return view('dashboards.avl.show', compact('avl'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $avl = Avl::findOrFail($id);
        return view('dashboards.avl.edit', compact('avl'));

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
        $request = $request->all();
        $avl = Avl::findOrFail($id);
        $avl->fill($request)->save();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => 'تامین کننده باموفقیت در سیستم ویرایش شد',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();

//        return redirect(url('avl'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avl  $avl
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contract = Avl::findOrFail($id);
      $contract->delete();
      return redirect()->back();

    }
}
