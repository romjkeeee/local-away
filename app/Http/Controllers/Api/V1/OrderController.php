<?php


namespace App\Http\Controllers\Api\V1;


use App\Box;
use App\Http\Controllers\Controller;
use App\Http\Requests\RefundReqeust;
use App\Http\Resources\OrderCollection;
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
            'data' => OrderCollection::collection($orders = Order::query()->where('user_id', auth()->id())->get())
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
                'data' => OrderCollection::make($order)
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
                ]);
                $order->save();
                foreach ($data['quiz'][0] as $settings) {
                    $date_city = $settings;
                }

                foreach ($data['quiz'][1] as $settings) {
                    $package_type = $settings;
                }

                foreach ($data['quiz'][2] as $settings) {
                    $travel_purposes = $settings;
                }
                foreach ($data['quiz'][3] as $settings) {
                    $personal_style_ids = $settings;

                }
                foreach ($data['quiz'][4] as $settings) {
                    $styled_id = $settings;
                }
                foreach ($data['quiz'][5] as $settings) {
                    $preferences = $settings;
                    $body_type = $preferences['body'];
                }
                foreach ($data['quiz'][6] as $settings) {
                    $sizing_info = $settings;
                }
                foreach ($data['quiz'][7] as $settings) {
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
            }

            if ($data['products']) {
                if (isset($order)) {
                    foreach ($data['products'] as $product) {
                        $order->order_products()->create([
                            'product_id' => $product['product_id'],
                            'size_id' => $product['size_id'],
                            'color_id' => $product['color_id'],
                            'count' => $product['count'],
                            'price' => $product['price'],
                        ]);
                    }
                } else {
                    $order = new Order([
                        'user_id' => auth()->id(),
                        'sum' => $data['sum'],
                        'address_id' => $data['address_id']
                    ]);
                    $order->save();
                    foreach ($data['products'] as $product) {
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

            return response(['status' => 'success', 'message' => 'created'], 201);
        } else {
            if (count($data['quiz'])) {
                $quiz_product = OrderQuizSetting::query()->where('order_id', $user_order->id)->first();
                if (!$quiz_product) {
                    $travel_box = Box::query()->first();
                    $order = new Order([
                        'user_id' => auth()->id(),
                        'sum' => $travel_box->price,
                        'address_id' => $data['address_id']
                    ]);
                    $order->save();
                    foreach ($data['quiz'][0] as $settings) {
                        $date_city = $settings;
                    }

                    foreach ($data['quiz'][1] as $settings) {
                        $package_type = $settings;
                    }

                    foreach ($data['quiz'][2] as $settings) {
                        $travel_purposes = $settings;
                    }
                    foreach ($data['quiz'][3] as $settings) {
                        $personal_style_ids = $settings;

                    }
                    foreach ($data['quiz'][4] as $settings) {
                        $styled_id = $settings;
                    }
                    foreach ($data['quiz'][5] as $settings) {
                        $preferences = $settings;
                        $body_type = $preferences['body'];
                    }
                    foreach ($data['quiz'][6] as $settings) {
                        $sizing_info = $settings;
                    }
                    foreach ($data['quiz'][7] as $settings) {
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
                }else{
                    foreach ($data['quiz'][0] as $settings) {
                        $date_city = $settings;
                    }

                    foreach ($data['quiz'][1] as $settings) {
                        $package_type = $settings;
                    }

                    foreach ($data['quiz'][2] as $settings) {
                        $travel_purposes = $settings;
                    }
                    foreach ($data['quiz'][3] as $settings) {
                        $personal_style_ids = $settings;

                    }
                    foreach ($data['quiz'][4] as $settings) {
                        $styled_id = $settings;
                    }
                    foreach ($data['quiz'][5] as $settings) {
                        $preferences = $settings;
                        $body_type = $preferences['body'];
                    }
                    foreach ($data['quiz'][6] as $settings) {
                        $sizing_info = $settings;
                    }
                    foreach ($data['quiz'][7] as $settings) {
                        $costs = $settings;
                    }


                    $user_order->quiz()->update([
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
                }
            }
            if ($data['products']) {
                foreach ($data['products'] as $product) {
                    $order_product = OrderProduct::query()->where('order_id', $user_order->id)->where('product_id', $product['product_id'])->first();
                    if (!$order_product) {
                        $user_order->order_products()->create([
                            'product_id' => $product['product_id'],
                            'size_id' => $product['size_id'],
                            'color_id' => $product['color_id'],
                            'count' => $product['count'],
                            'price' => $product['price'],
                        ]);
                    } else {
                        $order_product->update([
                            'size_id' => $product['size_id'],
                            'color_id' => $product['color_id'],
                            'count' => $product['count'],
                            'price' => $product['price'],
                        ]);
                    }
                }
                $user_order->update([
                    'sum' => $data['sum'],
                    'address_id' => $data['address_id']
                ]);
            }
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
}
