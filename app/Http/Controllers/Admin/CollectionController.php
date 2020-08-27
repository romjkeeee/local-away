<?php

namespace App\Http\Controllers\Admin;

use App\ClothesCategory;
use App\Collection;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreClothesCategory;
use App\Http\Requests\AdminStoreCollectionRequest;
use App\Http\Requests\AdminUpdateClothesCategory;
use App\Http\Requests\AdminUpdateCollectionRequest;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollectionController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin|user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = Collection::query()->with('products')->get();
        return view('admin.pages.collections.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.collections.create', compact('gender', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreCollectionRequest $request
     * @return RedirectResponse
     */
    public function store(AdminStoreCollectionRequest $request)
    {
        $collection = Collection::query()->create($request->validated());
        $collection->products()->attach($request->get('product_id'));
        if ($request->file('image')) {
            $collection->image = $request->file('image')->store('collection');
            $collection->update();
        }
        return redirect()->route('collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Collection $collection
     * @return Application|Factory|View
     */
    public function show(Collection $collection)
    {
        $data = $collection;
        $products = Product::all()->pluck('name', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.collections.show', compact('data', 'products', 'gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Collection $collection
     * @return Application|Factory|View
     */
    public function edit(Collection $collection)
    {
        $data = $collection;
        $products = Product::all()->pluck('name', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.collections.edit', compact('data', 'products', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateCollectionRequest $request
     * @param Collection $collection
     * @return RedirectResponse
     */
    public function update(AdminUpdateCollectionRequest $request, Collection $collection)
    {
        if ($collection->update($request->validated())) {
            if ($request->file('image')) {
                $collection->image = $request->file('image')->store('collection');
                $collection->update();
            }
            $collection->products()->sync($request->get('product_id'));
            return redirect()->route('collections.index');
        }
    }
}
