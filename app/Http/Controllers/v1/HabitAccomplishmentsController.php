<?php

namespace App\Http\Controllers\v1;

use App\Habit;
use App\Accomplishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HabitAccomplishmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Habit $habit, Request $request)
    {
        $query = $habit->accomplishments;

        try {
            //code...
            if($request->year){
                $query = $query->toQuery()->whereYear('date', $request->year)->get();
            }
            if ($request->month) {
                $query = $query->toQuery()->whereMonth('date', $request->month)->get();
            }
            return $query;
        } catch (\Throwable $th) {
            return [];
        }

        // Log::info($query->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function show(Accomplishment $accomplishment)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accomplishment $accomplishment)
    {
        //
    }
}