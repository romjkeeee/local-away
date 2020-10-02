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
            if (isset($order->tracking_number) && $order->tracking_number != '') {
                $track_status = Shipping::query()->where('tracking_number', $order->tracking_number)->first();
                if ($track_status){
                    $tracking_history = $track_status->tracking_history;
                }else{
                    return response(['status' => 'error', 'message' => 'Tracking info not found'], 404);
                }
            }else{
                return response(['status' => 'error', 'message' => 'Tracking info not found'], 404);
            }
            if ($tracking_history){
                return response(['status' => 'success', 'data' => json_decode($tracking_history, true)]);
            }else{
                return response(['status' => 'error', 'message' => 'Tracking info not found'], 404);
            }
        }else{
            return response(['status' => 'error', 'message' => 'Order not found'], 404);
        }
    }
}
