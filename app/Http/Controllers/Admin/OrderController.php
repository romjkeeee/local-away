<?php

namespace App\Http\Controllers\Admin;

use App\Age;
use App\Feet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GetPaymentRequest;
use App\Http\Requests\Admin\UpdateOrderReqeust;
use App\Measurement;
use App\Order;
use App\OrderProduct;
use App\OrderQuizSetting;
use App\Product;
use App\Services\Processors\Stripe;
use App\Status;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = Order::query()
            ->when($request->id, function ($q) use ($request) {
                $q->where('status_id', $request->id);
            })
            ->orderByDesc('created_at')
            ->get();
        return view('admin.pages.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        $data = $order;
        $product = $order->order_products_all()->with('product', 'size', 'color')->get();
        return view('admin.pages.orders.show', compact('data', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $data = $order;
        return view('admin.pages.orders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderReqeust $request, Order $order)
    {
        if ($order->status_id == 3 || $order->status_id == 4 || $order->status_id == 5 || $order->status_id == 6) {
            $products = $order->order_products_all()->get();
            if ($products) {
                foreach ($products as $product) {
                    if ($product->price == null || $product->count == null) {
                        return redirect()->route('orders.index')->withErrors(['One of products not set, go to order and check this']);
                    }
                }
            }
            if (!$order->quiz) {
                $order->update(['status_id' => 6]);
                $order->update($request->validated());
                foreach ($order->order_products_all as $product) {
                    $product->update(['status_id' => 6]);
                }
            } else {
                $good_status = [];
                foreach ($order->quiz as $quiz) {
                    if ($quiz->status_id == 5) {
                        $good_status[] = $quiz;
                    }
                }
                if ($order->status_id == 6){
                    $order->update($request->validated());
                    return redirect()->route('orders.index');
                }
                if (count($good_status) == count($order->quiz)) {
                    $order->update(['status_id' => 6]);
                    $order->update($request->validated());
                    foreach ($order->quiz as $quiz) {
                        $quiz->update(['status_id' => 6]);
                    }
                    foreach ($order->order_products_all as $product) {
                        $product->update(['status_id' => 6]);
                    }
                } else {
                    return redirect()->route('orders.index')->withErrors(['Quiz products must be loading']);
                }
            }
        }
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function equip($id)
    {
        $data = OrderQuizSetting::query()->with('quiz_products.product', 'quiz_products.size', 'quiz_products.color', 'order')->where('id', $id)->first();
        if ($data) {
            if ($data->status_id >= 2 && $data->status_id <= 4) {
                $data->update(['status_id' => 5]);
                if ($data->order) {
                    $data->order->update(['status_id' => 5]);
                }
            }
        }
        $products = Product::query()->where('status', 'active')->pluck('name', 'id');
        $preferences_array = array(
            'measurement' => Measurement::all(),
            'age' => Age::all(),
            'feet' => Feet::all()
        );
        return view('admin.pages.orders.product', compact('data', 'products', 'preferences_array'));
    }

    public function store_equip($id, Request $request)
    {
        $order = OrderQuizSetting::query()->where('id', $id)->first();
        if ($request->product_ids) {
            foreach ($request->product_ids as $product) {
                $order->quiz_products()->create([
                    'product_id' => $product,
                    'order_id' => $order->order_id,
                    'status_id' => 5
                ]);
            }
        }
        return redirect()->route('orders.equip', $order->id);
    }

    public function getPayment(Order $order, GetPaymentRequest $request)
    {
        $user = User::query()->where('id', $order->user_id)->first();
        $stripe = new Stripe('stripe');
        $payment = $stripe->getPay($user, $request);
        if ($payment['message'] == 'Success') {
            $order->status_id = Status::fullPayment()->id;
            $order->save();
            $order_product = $order->quiz_products()->where('status_id', '!=',11)->get();
            foreach ($order_product as $products){
                $products->status_id = Status::fullPayment()->id;
                $products->update();
            }
            $quizs = $order->quiz()->get();
            foreach ($quizs as $quiz){
                $quiz->status_id = Status::fullPayment()->id;
                $quiz->update();
            }
        }else{
            $order->status_id = Status::paymentFailed()->id;
            $order->save();
            $order_product = $order->quiz_products()->where('status_id', '!=',11)->get();
            foreach ($order_product as $products){
                $products->status_id = Status::paymentFailed()->id;
                $products->update();
            }
            $quizs = $order->quiz()->get();
            foreach ($quizs as $quiz){
                $quiz->status_id = Status::paymentFailed()->id;
                $quiz->update();
            }
        }
        return redirect()->route('orders.show', $order->id);
    }

    public function orderSuccess(Order $order)
    {
        $order->status_id = 12;
        $order->update();
        return redirect()->route('orders.index');
    }
}
