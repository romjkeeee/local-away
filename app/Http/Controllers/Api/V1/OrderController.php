<?php


namespace App\Http\Controllers\Api\V1;


use App\Box;
use App\Http\Controllers\Controller;
use App\Http\Requests\RefundReqeust;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderLast;
use App\Http\Resources\OrderReturnCollection;
use App\Order;
use App\OrderProduct;
use App\OrderQuizSetting;
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
        return response([
            'status' => 'success',
            'data' => OrderCollection::collection($orders = Order::query()->where('user_id', auth()->id())->where('status_id','>',1)->get())
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
        if ($order) {
            return response([
                'status' => 'success',
                'data' => OrderLast::make($order)
            ]);
        } else {
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
        $data = $request->all();
        $user_order = Order::query()->where('user_id', auth()->id())->where('status_id', 1)->first();
        if (!$user_order) {
//            $decoded_data = json_decode($data, true);
            if (count($data['quiz'])) {
                $travel_box = Box::query()->first();
                $order = new Order([
                    'user_id' => auth()->id(),
                    'sum' => $travel_box->price,
                    'address_id' => $data['address_id']
                ]);
                $order->save();
                $this->quiz_create($data, $order);
            }

            if ($data['products']) {
                if (isset($order)) {
                    $this->products_create($data['products'], $order);
                } else {
                    $order = new Order([
                        'user_id' => auth()->id(),
                        'sum' => $data['sum'],
                        'address_id' => $data['address_id']
                    ]);
                    $order->save();
                    $this->products_create($data['products'], $order);
                }
            }

            return response(['status' => 'success', 'message' => 'created'], 201);
        } else {
            if (count($data['quiz'])) {
                $this->quiz_create($data, $user_order);
                $user_order->update([
                    'user_id' => auth()->id(),
                    'sum' => $data['sum'],
                    'address_id' => $data['address_id']
                ]);
                $user_order->save();
            }else{
                if (count($user_order->quiz)){
                    $user_order->quiz()->delete();
                }
            }
            if ($data['products']) {
                $this->products_create($data['products'], $user_order);
                $user_order->update([
                    'sum' => $data['sum'],
                    'address_id' => $data['address_id']
                ]);
            }else{
                if ($user_order->order_products){
                    $user_order->order_products()->delete();
                }
            }
            $user_order->update([
                'sum' => $data['sum'],
                'address_id' => $data['address_id']
            ]);
            return response(['status' => 'success', 'message' => 'updated']);
        }
    }

    /**
     * Request refund
     * @bodyParam products_ids array
     *
     * @authenticated required
     * @response 201
     */
    public function refund(RefundReqeust $request, $id)
    {
        $order = Order::query()->where('user_id', auth()->id())->where('id', $id)->first();
        if ($order) {
            $check_order_product = OrderProduct::query()->where('order_id', $order->id)->whereIn('id', $request->get('products_ids'))->get();
            if (count($check_order_product) == count($request->get('products_ids'))) {
                foreach ($request->get('products_ids') as $key => $value) {
                    $order_product = OrderProduct::query()->where('order_id', $order->id)->where('id', $value)->update(['status_id' => 6]);
                }
                if ($order->update(['status_id' => 6])) {
                    return response(['status' => 'success', 'message' => 'Success send request'], 201);
                } else {
                    return response(['status' => 'error', 'message' => 'Something wrong'], 400);
                }
            } else {
                return response(['status' => 'error', 'message' => 'Order product not found'], 404);
            }
        } else {
            return response(['status' => 'error', 'message' => 'Order not found'], 404);
        }
    }

    /**
     * List refund
     *
     * @authenticated required
     * @response 200
     */
    public function refund_list()
    {
        $order = Order::query()
            ->where('user_id', auth()->id())
            ->where('status_id', '>=', 6)
            ->with(['order_products_all' => function ($q) {
                $q->where('status_id', '>=', 6);
            }])->get();
        if ($order) {
            return response([
                'status' => 'success',
                'data' => OrderReturnCollection::collection($order)
            ]);
        } else {
            return response(['status' => 'error', 'message' => 'No refunds'], 404);
        }
    }

    public function quiz_create($data, $order = null)
    {
        $order->quiz()->delete();
        foreach ($data['quiz'] as $quiz) {
//            foreach ($quiz[0] as $settings) {
//                $date_city = $settings;
//            }
//
//            foreach ($quiz[1] as $settings) {
//                $package_type = $settings;
//            }
//
//            foreach ($quiz[2] as $settings) {
//                $travel_purposes = $settings;
//            }
//            foreach ($quiz[3] as $settings) {
//                $personal_style_ids = $settings;
//
//            }
//            foreach ($quiz[4] as $settings) {
//                $styled_id = $settings;
//            }
            foreach ($quiz['preferences'] as $key => $value) {
                if ($key == 'body') {
                    $body_type = $value;
                }
            }
//            foreach ($quiz[6] as $settings) {
//                $sizing_info = $settings;
//            }
//            foreach ($quiz[7] as $settings) {
//                $costs = $settings;
//            }

            $order->quiz()->create([
                'date_city' => json_encode($quiz['dateCity']),
                'body_type_id' => $body_type,
                'package_type_id' => $quiz['package_type'],
                'personal_style_ids' => json_encode($quiz['personal_style']),
                'travel_purposes' => json_encode($quiz['travel_purposes']),
                'styled_id' => json_encode($quiz['styled']),
                'preferences' => json_encode($quiz['preferences']),
                'sizing_info' => json_encode($quiz['sizing_info']),
                'costs' => json_encode($quiz['budgets']),
                'status_id' => 1,
            ]);
        }
    }

    public function products_create($products, $order)
    {
        $order->order_products()->delete();
        foreach ($products as $product) {
            $order->order_products()->create([
                'product_id' => $product['product_id'],
                'size_id' => $product['size_id'],
                'color_id' => $product['color_id'],
                'count' => $product['count'],
                'price' => $product['price'],
            ]);
        }
    }
}
