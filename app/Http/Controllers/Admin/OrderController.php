<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct() {
        $this->middleware('role:admin|user');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        $data = $order;
        $product = $order->order_products()->with('product', 'size', 'color')->get();
        return view('admin.pages.orders.show', compact('data', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function equip(Order $order)
    {
        $data = Order::query()->with('quiz','address','order_products.product', 'order_products.size','order_products.color')->where('id',$order->id)->first();
        $products = Product::all()->pluck('name','id');
        return view('admin.pages.orders.product', compact('data', 'products'));
    }

    public function store_equip(Order $order, Request $request)
    {
        $order = Order::query()->where('id',$order->id)->first();
        if ($request->product_ids) {
            foreach ($request->product_ids as $product) {
                $order->order_products()->create([
                    'product_id' => $product,
                    'order_quiz_id' => $order->quiz->id
                ]);
            }
        }
        return redirect()->route('orders.equip', $order->id);
    }
}
