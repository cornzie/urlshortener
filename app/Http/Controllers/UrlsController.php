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
        $validated = $request->validate([
            "url" => "required"
        ]);

        $check = Urls::firstWhere('url', $validated['url']);
        if($check){
            return view('welcome')->with('code', $check->code);
        } else{
            //Insert
            $check = Urls::create([
                'url' => $validated['url'],
                'code' => md5(substr($validated['url'].microtime(), 1, rand(2, 5))),
            ]);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function show(Urls $urls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function edit(Urls $urls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urls $urls)
    {
        //
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
