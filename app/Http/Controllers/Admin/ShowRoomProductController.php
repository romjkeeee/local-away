<?php

namespace App\Http\Controllers\Admin;

use App\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminShowRoomProductStoreRequest;
use App\Http\Requests\AdminShowRoomProductUpdateRequest;
use App\ShowRoomProduct;
use Illuminate\Http\Request;

class ShowRoomProductController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = ShowRoomProduct::query()->with('collection')->get();
        return view('admin.pages.show_room_product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $collection = Collection::query()->pluck('name','id');
        return view('admin.pages.show_room_product.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminShowRoomProductStoreRequest $request)
    {
        $collection = ShowRoomProduct::query()->create($request->validated());
        if ($request->file('image')) {
            $collection->image = $request->file('image')->store('showroom-product');
            $collection->update();
        }
        return redirect()->route('show-room-products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowRoomProduct  $showRoomProduct
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(ShowRoomProduct $show_room_product)
    {
        $data = $show_room_product;
        $collection = Collection::query()->pluck('name','id');
        return view('admin.pages.show_room_product.show', compact('data', 'collection'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowRoomProduct  $showRoomProduct
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(ShowRoomProduct $show_room_product)
    {
        $data = $show_room_product;
        $collection = Collection::query()->pluck('name','id');
        return view('admin.pages.show_room_product.edit', compact('data', 'collection'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowRoomProduct  $showRoomProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminShowRoomProductUpdateRequest $request, ShowRoomProduct $show_room_product)
    {
        if ($show_room_product->update($request->validated())) {
            if ($request->file('image')) {
                $show_room_product->image = $request->file('image')->store('showroom-product');
                $show_room_product->update();
            }
            return redirect()->route('show-room-products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowRoomProduct  $showRoomProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowRoomProduct $showRoomProduct)
    {
        //
    }
}
