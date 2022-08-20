<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Language;
use App\Http\Requests\Backend\Languages;
use Auth;
use Str; 

class LanguageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.pages.lang.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.lang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Languages $request)
    {
        //
        // Will return only validated data
        
        $validated = $request->validated();

        $lang = new Language;

        $lang->name         =  $request->name;
        $lang->slug         =  Str::slug($lang->name);
        $lang->shortname    =  $request->shortname;
        $lang->status       =  $request->status;
        $lang->user_id      =  Auth::user()->id;


        $lang->save();

        return redirect()->route('admin.lang.manage', $lang)->withFlashSuccess(__('The language was successfully created.'));
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
