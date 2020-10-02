<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Http\Requests\AdminStoreCity;
use App\Http\Requests\AdminStoreColor;
use App\Http\Requests\AdminStoreProductRequest;
use App\Http\Requests\AdminUpdateCity;
use App\Http\Requests\AdminUpdateColor;
use App\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class ProductCategoryController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = ProductCategory::all();
        return view('admin.pages.product_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreCity $request
     * @return RedirectResponse
     */
    public function store(StoreProductCategoryRequest $request)
    {
        if (ProductCategory::query()->create($request->validated())){
            return redirect()->route('product-categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ProductCategory $product_category
     * @return Application|Factory|View
     */
    public function show(ProductCategory $product_category)
    {
        $data = $product_category;
        return view('admin.pages.product_category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function edit(ProductCategory $product_category)
    {
        $data = $product_category;
        return view('admin.pages.product_category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateCity $request
     * @param ProductCategory $product_category
     * @return RedirectResponse
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $product_category)
    {
        if ($product_category->update($request->validated()))
        {
            return redirect()->route('product-categories.index');
        }
    }
}
