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
    public function store(Habit $habit, Request $request)
    {
        $date = $request->year . "-". $request->month . "-" . $request->day;
        if($accomplishment = $habit->accomplishments->toQuery()->whereDate('date', $date)->get()->count() > 0){
            return response('', 409);
        }
        $accomplishment = $habit->accomplishments()->create([
            "date"=> $date
        ]);
        if($accomplishment){
            return response()->json(json_encode($accomplishment->toArray()), 201);
        } else {
            return response('', 400);
        }

    }

    /**
     * Destroy accomplishment without the need for
     */
    public function destroyByDate( Request $request, Habit $habit)
    {
        $date = $request->year . "-". $request->month . "-" . $request->day;
        $accomplishment = $habit->accomplishments->toQuery()->whereDate('date', $date)->first();
        if($accomplishment != null){
            if($accomplishment->delete()){
                return response('', 204);
            } else {
                return response('', 400);
            }
        } else {
            return response('', 404);
        }
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