<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Language;
use App\Models\Backend\TextLanguage;
use Auth;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function translate(Request $request)
    {
       $requesttranslate = $request->transText;

        $request->validate([
            $requesttranslate => 'exists:orders,id',
        ]);

       $query =  TextLanguage::where('keyword', 'like', '%'.$requesttranslate.'%')->first();

       return response()->json(['query' => $query]);

    }
}
