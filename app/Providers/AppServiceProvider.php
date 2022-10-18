<?php

namespace App\Providers;

use Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('posts', function($posts) {
            $data = array();
            foreach($posts as $post) {
                $data_post = [
                    'id' => $post->id,
                    'photo' => asset('storage/'.$post->photo),
                    'date' => $post->created_at->format('d-m-Y'),
                    'time' => $post->created_at->format('H:i A'),
                ];
                array_push($data, $data_post);
            }

            return response([
                'success' => true,
                'posts' => $data,
                'previous_page' => $posts->previousPageUrl(),
                'current_page' => $posts->url($posts->currentPage()),
                'next_page' => $posts->nextPageUrl(),
            ],200);
        });

        Response::macro('calendar', function($data) {
            $calendar = array();
            foreach($data as $dt) {
                $calendar_data = [
                    'date' => $dt->created_at->format('d-m-Y'),
                    '12:00 PM' => $dt->twelve_hr,
                    '4:00 PM' => $dt->four_hr,
                ];
                array_push($calendar, $calendar_data);
            }

            return response([
                'success' => true,
                'data' => $calendar,
            ],200);
        });
    }
}
