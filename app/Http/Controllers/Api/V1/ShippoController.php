<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Order;
use App\Shipping;
use App\OrderProduct;
use Illuminate\Http\Request;

class ShippoController extends Controller
{
    public function webhook(Request $request)
    {
        $data = $request->all();
        $shippo = Shipping::query()->where('tracking_number', $data['data']['tracking_number'])->first();
        if ($shippo) {
            $shippo->update([
                'messages' => json_encode($data['data']['messages']),
                'carrier' => $data['data']['carrier'],
                'address_from' => json_encode($data['data']['address_from']),
                'address_to' => json_encode($data['data']['address_to']),
                'eta' => $data['data']['eta'],
                'original_eta' => $data['data']['original_eta'],
                'servicelevel' => json_encode($data['data']['servicelevel']),
                'metadata' => $data['data']['metadata'],
                'tracking_status' => json_encode($data['data']['tracking_status']),
                'tracking_history' => json_encode($data['data']['tracking_history']),
                'transaction' => $data['data']['transaction'],
                'test' => $data['data']['test'],
            ]);
            $status = $data['data']['tracking_status'];
            if ($status['status'] == 'DELIVERED') {
                $order = Order::query()->where('tracking_number', $shippo->tracking_number)->first();
                if ($order) {
                    $order->update(['status_id' => 7]);
                }
                $order_product = OrderProduct::query()->where('order_id', $order->id)->get();
                if ($order_product) {
                    foreach ($order_product as $product) {
                        $product->update(['status_id' => 7]);
                    }
                }
                if ($order->quiz) {
                    foreach ($order->quiz as $quiz) {
                        $quiz->update(['status_id' => 7]);
                    }
                }
            }
        } else {
            Shipping::query()->create([
                'messages' => json_encode($data['data']['messages']),
                'carrier' => $data['data']['carrier'],
                'tracking_number' => $data['data']['tracking_number'],
                'address_from' => json_encode($data['data']['address_from']),
                'address_to' => json_encode($data['data']['address_to']),
                'eta' => $data['data']['eta'],
                'original_eta' => $data['data']['original_eta'],
                'servicelevel' => json_encode($data['data']['servicelevel']),
                'metadata' => $data['data']['metadata'],
                'tracking_status' => json_encode($data['data']['tracking_status']),
                'tracking_history' => json_encode($data['data']['tracking_history']),
                'transaction' => $data['data']['transaction'],
                'test' => $data['data']['test'],
            ]);
        }
    }

    public function address_validation(Request $request)
    {
        $shippo = new \App\Services\Shipping();
        $validation = $shippo->validateAddress($request);
        $ser = object_get($validation, 'validation_results');
        foreach ($ser->messages as $mess) {
            $data[] = ['source' => $mess['source'],
                'code' => $mess['code'],
                'type' => $mess['type'],
                'text' => $mess['text'],
            ];
        }
        return response()->json([
            'is_valid' => $validation['validation_results']['is_valid'],
            'messages' => $data
        ]);
    }
}
