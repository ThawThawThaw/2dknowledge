<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar() {
        $data = Calendar::cursor();

        return response()->calendar($data);
    }
}
