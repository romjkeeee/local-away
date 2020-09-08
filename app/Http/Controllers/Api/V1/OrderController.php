<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 *
 * APIs for
 */
class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Get orders
     *
     * @authenticated required
     * @response 200
     */
    public function index()
    {
        $orders = Order::query()->where('user_id', auth()->id())->get();
//        foreach ($orders as $order){
//            if($order->status_id == 5 && $order->has('quiz')->first()){
//                $data[] = OrderCollection::make($order->with('order_products.product', 'status')->first());
//            }elseif(!$order->has('quiz')) {
//                $data[] = OrderCollection::make($order->with('order_products.product', 'status')->first());
//            }else{
//                $data[] = OrderCollection::make($order->with('status')->first());
//            }
//        }
        return response([
            'status' => 'success',
            'data' => OrderCollection::collection($orders)
        ]);
    }

    /**
     * Get last order
     *
     * @authenticated required
     * @response 200
     */
    public function show_last()
    {
        $order = Order::query()->where('user_id', auth()->id())->where('status_id', 1)->first();
        if($order) {
            return response([
                'status' => 'success',
                'data' => OrderCollection::make($order)
            ]);
        }else{
            return response([
                'status' => 'success',
                'message' => 'You dont have new orders'
            ]);
        }
    }

    /**
     * new order
     *
     * @authenticated required
     * @response 201
     */
    public function store(Request $request)
    {
//        $data = '[{"dateCity":{"city":3,"date":{"start":"2020/09/22"}}},{"package_type":2},{"travel_purposes":[6]},{"personal_style":[10,1,6]},{"styled":[3]},{"preferences":{"measurement":2,"height":"123","feet":2,"age":3,"body":2}},{"sizing_info":[{"sizing_category_id":1,"sizing_types":6,"id":1},{"sizing_category_id":2,"sizing_types":7,"id":1},{"sizing_category_id":2,"sizing_types":10,"id":2},{"sizing_category_id":3,"sizing_types":8,"id":1},{"sizing_category_id":3,"sizing_types":9,"id":3},{"sizing_category_id":4,"sizing_types":2,"id":3},{"sizing_category_id":4,"sizing_types":3,"id":1},{"sizing_category_id":4,"sizing_types":4,"id":2}]},{"budgets":{"selectForm":[{"cost":1,"category_id":1,"cost_from":100,"cost_to":200},{"cost":1,"category_id":2,"cost_from":100,"cost_to":200},{"cost":1,"category_id":3,"cost_from":100,"cost_to":200},{"cost":1,"category_id":4,"cost_from":100,"cost_to":200},{"cost":1,"category_id":5,"cost_from":100,"cost_to":200},{"cost":1,"category_id":6,"cost_from":100,"cost_to":200}],"text":"","all_cost_from":600,"all_cost_to":1200}}]';

        $user_order = Order::query()->where('user_id', auth()->id())->where('status_id', 1)->first();
        if (!$user_order) {
            $data = $request->all();
//            $decoded_data = json_decode($data, true);

            $order = new Order([
                'user_id' => 1,
                'sum' => 50,
                'status_id' => 1
            ]);
            $order->save();
            foreach ($data[0] as $settings) {
                $date_city = $settings;
            }

            foreach ($data[1] as $settings) {
                $package_type = $settings;
            }

            foreach ($data[2] as $settings) {
                $personal_style_ids = $settings;
            }
            foreach ($data[3] as $settings) {
                $travel_purposes = $settings;

            }
            foreach ($data[4] as $settings) {
                $styled_id = $settings;
            }
            foreach ($data[5] as $settings) {
                $preferences = $settings;
                $body_type = $preferences['body'];
            }
            foreach ($data[6] as $settings) {
                $sizing_info = $settings;
            }
            foreach ($data[7] as $settings) {
                $costs = $settings;
            }


            $order->quiz()->create([
                'date_city' => json_encode($date_city),
                'body_type_id' => $body_type,
                'package_type_id' => $package_type,
                'personal_style_ids' => json_encode($personal_style_ids),
                'travel_purposes' => json_encode($travel_purposes),
                'styled_id' => json_encode($styled_id),
                'preferences' => json_encode($preferences),
                'sizing_info' => json_encode($sizing_info),
                'costs' => json_encode($costs),
                'status_id' => 1,
            ]);

            return response(['status' => 'success', 'message' => 'created'], 201);
        } else {
            dd($request->all());
            $user_order->update();
        }
    }

    /**
     * Request refund
     *
     * @authenticated required
     * @response 201
     */
    public function refund($id)
    {
        if (Order::query()->where('user_id', auth()->id())->where('id', $id)->update(['status_id', 6])) {
            return response(['status' => 'success', 'message' => 'Success send request']);
        } else {
            return response(['status' => 'error', 'message' => 'Error send request'], 404);
        }
    }
}
