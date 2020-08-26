<?php

namespace App\Http\Controllers;

use App\Urls;
use Illuminate\Http\Request;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "url" => "required"
        ]);

        $check = Urls::firstWhere('url', $validated['url']);
        if($check){
            //dd($check->code);
            return view('welcome')->with('code', $check->code);
        } else{
            //Insert
            $code = url('/'.substr(md5($validated['url'].microtime()), 1, 5));
            $check = Urls::create([
                'url' => $validated['url'],
                'code' => $code,
            ]);
            //dd($code);
            return view('welcome')->with('code', $code);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Illuminate\Http\Request  $code
     * @return \Illuminate\Http\Response
     */
    public function redirect($code)
    {
        $redirectTo = Urls::firstWhere('code', url('/'.$code));
        //dd($redirectTo);
        if($redirectTo){
            return redirect($redirectTo->url);
        }

        return redirect()->back()->with('error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urls $urls)
    {
        //
    }
}
