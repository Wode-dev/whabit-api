<?php

namespace App\Http\Controllers\v1;

use App\Habit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Habit as HabitResource;

class HabitController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Habit::class, 'habit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return HabitResource::collection($user->habits);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $user->habits()->create($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function show(Habit $habit)
    {
        return new HabitResource($habit->load("accomplishments:id,habit_id,date"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habit $habit)
    {
        $habit->update($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habit  $habit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habit $habit)
    {
        $habit->delete();
    }
}
