<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object)['type' => 'calendar'];
        $numbers = Calendar::latest()->get();

        return view('calendar.index',compact('data','numbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)['type' => 'calendar'];

        return view('calendar.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'time' => 'required',
            'number' => 'required'
        ]);

        $calendar = Calendar::firstOrCreate(['created_at' => $request->created_at]);

        if($request->time == '12:00 PM') {
            $calendar->twelve_hr = $request->number;
        } else {
            $calendar->four_hr = $request->number;
        }
        
        $calendar->type = 'calendar';
        $calendar->created_at = $request->created_at;
        $calendar->save();

        return redirect()->route('calendar.index')->with('info','Number added to calendar.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('calendar.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = Calendar::findOrFail($id);

        return view('calendar.edit',compact('data'));
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
        return redirect()->route('calendar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Calendar::findOrFail($id);
        $data->delete();

        return redirect()->route('calendar.index')->with('info','Number removed successfully from Calendar.');
    }
}
