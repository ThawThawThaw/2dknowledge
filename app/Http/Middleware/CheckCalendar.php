<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CheckCalendar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // get current day
        $current_day = Carbon::now();

        if($current_day->format('d') == '1') {
            $calendar = Calendar::all();

            $calendar->map->delete(); // we store only 1 month data
        }
        
        return $next($request);
    }
}
