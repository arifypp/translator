<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\TextLanguage;
use App\Http\Requests\Backend\TextLanguageRequest;
use Auth;
use Str; 

class TextLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.pages.textlang.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.textlang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TextLanguageRequest $request)
    {
        //
        $validated = $request->validated();

        $content = new TextLanguage;

        $content->sourcetext    =   $request->sourcetext;
        $content->sourcelang    =   $request->sourcelanguage;
        $content->targettext    =   $request->targettext;
        $content->targetlang    =   $request->targetlanguage;
        $content->keyword       =   $request->keyword;
        $content->status        =   $request->status;
        $content->user_id       =   Auth::user()->id;

        $content->save();

        return redirect()->route('admin.textlang.manage', $content)->withFlashSuccess(__('The language was successfully created.'));
        
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
