<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;
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
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OrderProduct $orderProduct)
    {
        $data = OrderProduct::query()->where('id',$orderProduct->id)->with('product')->first();
        $sizes = Sizing::all()->pluck('title', 'id');
        $colors = Color::all()->pluck('name','id');
        return view('admin.pages.order_product.edit', compact('data','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
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
