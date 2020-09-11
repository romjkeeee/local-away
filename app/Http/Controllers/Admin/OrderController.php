<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateOrderReqeust;
use App\Order;
use App\Product;
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
            ->orderByDesc('id')
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
        if ($order->status_id == 2 || $order->status_id == 3) {
            if (!$order->quiz()) {
                $order->update(['status_id' => 4]);
                $order->update($request->validated());
                foreach ($order->order_products_all as $product){
                    $product->update(['status_id'=>4]);
                }
            }else{
                $good_status = [];
                foreach ($order->quiz() as $quiz){
                    if ($quiz->status_id == 3){
                        $good_status[] = $quiz;
                    }
                }
                if (count($good_status) == count($order->quiz()->get())){
                    $order->update(['status_id'=>4]);
                    $order->update($request->validated());
                    foreach ($order->order_products_all as $product){
                        $product->update(['status_id'=>4]);
                    }
                }else{
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
    public function equip(Order $order)
    {
        $data = Order::query()->with('quiz', 'address', 'order_products.product', 'order_products.size', 'order_products.color')->where('id', $order->id)->first();
        if ($data->status_id == 2) {
            $data->update(['status_id' => 3]);
            if ($data->quiz()){
                foreach ($data->quiz() as $quiz){
                    $quiz->update(['status_id'=>3]);
                }
            }
        }
        $products = Product::query()->where('status', 'active')->pluck('name', 'id');
        $preferences_array = array(
            'measurement' => [
                [
                    'id' => 1,
                    'name' => 'imperial'
                ],
                [
                    'id' => 2,
                    'name' => 'metric'
                ],
            ],
            'age' => [
                [
                    'id' => 1,
                    'name' => '18-20'
                ],
                [
                    'id' => 2,
                    'name' => '20-25'
                ],
                [
                    'id' => 3,
                    'name' => '25-30'
                ],
                [
                    'id' => 4,
                    'name' => '30-35'
                ],
                [
                    'id' => 5,
                    'name' => '35+'
                ],
            ],
            'feet' => [
                [
                    'id' => 1,
                    'name' => '35'
                ],
                [
                    'id' => 2,
                    'name' => '36'
                ],
                [
                    'id' => 3,
                    'name' => '37'
                ],
                [
                    'id' => 4,
                    'name' => '38'
                ],
                [
                    'id' => 5,
                    'name' => '39'
                ],
                [
                    'id' => 6,
                    'name' => '40'
                ],
                [
                    'id' => 6,
                    'name' => '41'
                ],
                [
                    'id' => 7,
                    'name' => '42'
                ],
            ],
        );
        return view('admin.pages.orders.product', compact('data', 'products', 'preferences_array'));
    }

    public function store_equip(Order $order, Request $request)
    {
        $order = Order::query()->where('id', $order->id)->first();
        if ($request->product_ids) {
            foreach ($request->product_ids as $product) {
                $order->quiz_products()->create([
                    'product_id' => $product,
                    'order_quiz_id' => $order->quiz->first()->id
                ]);
            }
        }
        return redirect()->route('orders.equip', $order->id);
    }
}
