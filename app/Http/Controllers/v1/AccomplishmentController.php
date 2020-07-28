<?php

namespace App\Http\Controllers\v1;

use App\Accomplishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccomplishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Accomplishment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Accomplishment::create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function show(Accomplishment $accomplishment)
    {
        return $accomplishment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accomplishment $accomplishment)
    {
        $accomplishment->update($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accomplishment $accomplishment)
    {
        $accomplishment->delete();
    }
}