<?php

namespace App\Http\Controllers\Nilsan;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Nilsan\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('dashboards.nilsan.article', compact('articles'));
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
    public function store(ArticleRequest $request)
    {
        if($request->file('file')){
            $attachmentFile = $request->file('file');
            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Articles', $attachmentFileName);
          }else{
            $attachmentFileName = "Nothing";
          }

          Article::create([
          'content' => $request->content,
          'title' => $request->title,
          'file' => 'storage/Articles/' . $attachmentFileName,
          'status' => 'تایید نشده',
          'user_id' => auth()->user()->id,

        ]);

        \Session::flash('updateUser', array(
          'flash_title' => 'انجام شد',
          'flash_message' => '  باموفقیت ثبت شد.',
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
    public function update(ArticleRequest $request, $id)
    {
        $phoneBook = Article::findOrFail($id);


        if($request->file('file'))
        {
            $attachmentFile = $request->file('file');

            $attachmentFileName = time() . "_" . $attachmentFile->getClientOriginalName();
            $attachmentFile->move('storage/Articles', $attachmentFileName);

            if (file_exists(($phoneBook->file)))
                unlink($phoneBook->file);

            $phoneBook->file = 'storage/Articles/' . $attachmentFileName;

        }

        $phoneBook->title = $request->title;
        $phoneBook->content = $request->content;

        $phoneBook->update();



        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => '  باموفقیت در سیستم آپدیت شد',
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
        $contract = Article::findOrFail($id);
        $contract->delete();

        \Session::flash('updateUser', array(
            'flash_title' => 'انجام شد',
            'flash_message' => '    باموفقیت از سیستم حذف شد.',
            'flash_level' => 'success',
            'flash_button' => 'بستن'
        ));

        return redirect()->back();
    }
}
