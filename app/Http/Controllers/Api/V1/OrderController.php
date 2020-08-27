<?php


namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Order;

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
        foreach ($orders as $order){
            if($order->status_id == 5 && $order->has('quiz')->first()){
                $data[] = OrderCollection::make($order->with('order_products.product', 'status')->first());
            }elseif(!$order->has('quiz')) {
                $data[] = OrderCollection::make($order->with('order_products.product', 'status')->first());
            }else{
                $data[] = OrderCollection::make($order->with('status')->first());
            }
        }
        return response([
            'status'=>'success',
            'data' => $data
        ]);
    }

    /**
     * new order
     *
     * @authenticated required
     * @response 201
     */
    public function store()
    {
        $data = '[{"dateCity":{"city":3,"date":{"start":"2020/09/22"}}},{"package_type":2},{"travel_purposes":[6]},{"personal_style":[10,1,6]},{"styled":[3]},{"preferences":{"measurement":2,"height":"123","feet":2,"age":3,"body":2}},{"sizing_info":[{"sizing_category_id":1,"sizing_types":6,"id":1},{"sizing_category_id":2,"sizing_types":7,"id":1},{"sizing_category_id":2,"sizing_types":10,"id":2},{"sizing_category_id":3,"sizing_types":8,"id":1},{"sizing_category_id":3,"sizing_types":9,"id":3},{"sizing_category_id":4,"sizing_types":2,"id":3},{"sizing_category_id":4,"sizing_types":3,"id":1},{"sizing_category_id":4,"sizing_types":4,"id":2}]},{"budgets":{"selectForm":[{"cost":1,"category_id":1,"cost_from":100,"cost_to":200},{"cost":1,"category_id":2,"cost_from":100,"cost_to":200},{"cost":1,"category_id":3,"cost_from":100,"cost_to":200},{"cost":1,"category_id":4,"cost_from":100,"cost_to":200},{"cost":1,"category_id":5,"cost_from":100,"cost_to":200},{"cost":1,"category_id":6,"cost_from":100,"cost_to":200}],"text":"","all_cost_from":600,"all_cost_to":1200}}]';

        $test = json_decode($data, true);
        $user_order = Order::query()->where('user_id',111)->where('status_id',1)->first();
        if (!$user_order) {

            $order = new Order([
                'user_id' => auth()->id,
                'sum' => '50',
                'status_id' => 1
            ]);
            $order->save();
            foreach ($test as $quiz) {
                $order->quiz()->create([
                    'date_city' => $quiz->dateCity,
                    'package_type_id' => $quiz->package_type,
                    'personal_style_ids' => $quiz->personal_style,
                    'travel_purposes' => $quiz->travel_purposes,
                    'styled_id' => $quiz->styled,
                    'preferences' => $quiz->preferences,
                    'sizing_info' => $quiz->sizing_info,
                    'costs' => $quiz->budgets,
                    'status_id' => 1,
                ]);
            }
        }else{

        }
    }
}
