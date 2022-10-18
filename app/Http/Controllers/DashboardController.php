<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // edit form
    public function edit($content) {
        $data = Number::where('type',$content)->first();

        $name = $this->name($data);

        return view('lottery.edit',compact('data','name'));
    }

    public function update(Request $request,$id) {
        $validatedData = request()->validate([
            'content' => 'required',
            'description' => 'required',
        ]);

        $lottery = Number::find($id);

        $lottery->content = $request->content;
        $lottery->description = $request->description;
        $lottery->save();

        return redirect('/show/'.$lottery->type)->with("info","Updated successfully.");
    }

    public function show($content) {
        $data = Number::where('type',$content)->first();

        $name = $this->name($data);

        return view('lottery.show',compact('data','name'));
    }

    // change name
    public function name($content) {
        $name ='';

        if($content->type == 'numbers') {
            $name = 'ထိုးကွက်';
        }
        if($content->type == 'one_number') {
            $name = 'တကွက်ကောင်း';
        }
        if($content->type == 'one_change') {
            $name = 'ဝမ်းချိန်း';
        }
        if($content->type == 'lone_paing') {
            $name = 'လုံးပိုင်';
        }
        if($content->type == 'own_number') {
            $name = 'မွေးကွက်';
        }
        if($content->type == 'ch_key') {
            $name = 'Ch + Key';
        }
        if($content->type == 'about_2d') {
            $name = '2D အကြောင်း';
        }
        if($content->type == 'about_app') {
            $name = 'App အကြောင်း';
        }

        return $name;
    }
}
