<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Point;
use App\Models\Number;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LotteryController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function numbers($type) {
        $data = Number::where('type',$type)->first();

        // response success
        return response([
            'success' => true,
            'message' => 'lottery data by '.$data->type,
            'numbers' => $data->content,
            'description' => $data->description,
            'type' => $data->type,
        ], 200);
    }

    public function set_points(Request $request) {
        // validate requests
        $validator = Validator::make($request->all(), [
            'device_id' => 'required',
        ]);

        // if validation fails
        if($validator->fails()) {
            return response([
                'success' => false,
                'message' => 'something went wrong.',
            ], 400);
        }

        $point = Point::where('device_id',$request->device_id)->first();
        $points = 1;

        if($point) {
            $point->device_id = $request->device_id;
            $point->points = $point->points+$points;
            $point->save();
        } else {
            $point = new Point();
            $point->device_id = $request->device_id;
            $point->points = $points;
            $point->save();
        }

        // response success
        return response()->json([
            'success' => true,
            'message' => 'increase points of given device id',
            'device_id' => $point->device_id,
            'points' => $point->points,
        ], 200);
    }

    public function decrease_points($device_id) {
        $point = Point::where('device_id',$device_id)->first();

        if($point) {
            if($point->points >= 1) {
                $point->points = $point->points - 1; // decrease 1 points per click
                $point->save();

                // response success
                return response()->json([
                    'success' => true,
                    'message' => 'decrease points of given device id',
                    'device_id' => $point->device_id,
                    'points' => $point->points,
                ], 200);
            } else {
                return response([
                    'success' => false,
                    'message' => 'insufficient points.',
                ], 400);
            }
        } else {
            return response([
                'success' => false,
                'message' => 'device id not found.',
            ], 400);
        }
    }

    public function get_points($device_id) {
        $data = Point::where('device_id',$device_id)->first();

        // if new device id
        if(empty($data)) {
            return response([
                'success' => true,
                'message' => 'points of device id',
                'device_id' => $device_id,
                'points' => 0,
            ], 200);
        }

        // response success
        return response([
            'success' => true,
            'message' => 'points of device id',
            'device_id' => $data->device_id,
            'points' => $data->points,
        ], 200);
    }
}
