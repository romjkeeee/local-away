<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateOrderProductRequest;
use App\OrderProduct;
use App\Sizing;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderProduct $order_product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OrderProduct $order_product)
    {
        $data = OrderProduct::query()->where('id',$order_product->id)->with('product','product.sizes')->first();
        $sizes = $data->product->sizes->pluck('title','id');
        $colors = $data->product->colors->pluck('name','id');
        return view('admin.pages.order_product.edit', compact('data','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOrderProductRequest $request, OrderProduct $order_product)
    {
        $order_product->update($request->validated());
        return redirect()->route('orders.equip', $order_product->order_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OrderProduct $orderProduct)
    {
        if ($orderProduct->delete())
        {
            return redirect()->back();
        }
    }
}
