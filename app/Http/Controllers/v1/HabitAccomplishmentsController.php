<?php

namespace App\Http\Controllers\v1;

use App\Habit;
use App\Accomplishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HabitAccomplishmentsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Accomplishment::class, 'accomplishment');
    }

    /**
     * Retrieves all accomplishments from a habit
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Habit $habit, Request $request)
    {
        $query = $habit->accomplishments;

        try {
            //code...
            if ($request->year) {
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
     * Saves an accomplishment
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Habit $habit, Request $request)
    {
        $date = $request->year . "-" . $request->month . "-" . $request->day;

        try {
            // toQuery with no accomplishments results on exception
            $accomplishment = $habit->accomplishments->toQuery()->whereDate('date', $date)->get()->count() > 0;
        } catch (\Throwable $th) {
            // In case there is an error, it means there aren't any accomplishments

            $accomplishment = false;
        }
        // In case there are accomplishments there already, return error code
        if ($accomplishment) {
            return response('', 409);
        }

        // Then, create one
        $accomplishment = $habit->accomplishments()->create([
            "date" => $date
        ]);

        if ($accomplishment) {
            return response()->json($accomplishment->toArray(), 201);
        } else {
            return response('', 400);
        }
    }

    /**
     * Destroy accomplishment without the need for getting the id
     */
    public function destroyByDate(Request $request, Habit $habit)
    {
        //If user can update the habit, then user can destroyByDate
        $this->authorize('update', $habit);

        $date = $request->year . "-" . $request->month . "-" . $request->day;
        $accomplishment = $habit->accomplishments->toQuery()->whereDate('date', $date)->first();
        if ($accomplishment != null) {
            if ($accomplishment->delete()) {
                return response('', 204);
            } else {
                return response('', 400);
            }
        } else {
            return response('', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accomplishment  $accomplishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accomplishment $accomplishment)
    {
        if ($accomplishment->delete()) {
            return response('', 204);
        } else {
            return response('', 400);
        }
    }
}
