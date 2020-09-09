<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Order;
use App\Shipping;
use Illuminate\Http\Request;

/**
 * @group Tracking Status
 *
 * APIs for
 */
class TrackOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List
     * Show room list
     * @authenticated required
     * @response 200
     */
    public function show($id)
    {
        $order = Order::query()->where('user_id', auth()->id())->where('id',$id)->first();
        if ($order){
            $track_status = Shipping::query()->where('tracking_number',$order->tracking_number)->first()->tracking_history;
            if ($track_status){
                return response(['status' => 'success', 'data' => json_decode($track_status, true)]);
            }else{
                return response(['status' => 'error', 'message' => 'Tracking info not found'], 404);
            }
        }else{
            return response(['status' => 'error', 'message' => 'Order not found'], 404);
        }
    }
}
