<?php

namespace App\Http\Controllers\Admin;

use App\ClothesCategory;
use App\Cost;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreClothesCategory;
use App\Http\Requests\AdminUpdateClothesCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClothesCategoryController extends Controller
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
        $data = ClothesCategory::all();
        return view('admin.pages.clothes_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $costs = Cost::all()->pluck('title','id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.clothes_category.create', compact('costs','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreClothesCategory $request
     * @return RedirectResponse
     */
    public function store(AdminStoreClothesCategory $request)
    {
        $clother = ClothesCategory::query()->create($request->validated());
        if ($clother) {
            $clother->costs()->attach($request->get('cost_id'));
            return redirect()->route('clothes-categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ClothesCategory $clothes_category
     * @return Application|Factory|View
     */
    public function show(ClothesCategory $clothes_category)
    {
        $data = $clothes_category;
        return view('admin.pages.clothes_category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClothesCategory $clothes_category
     * @return Application|Factory|View
     */
    public function edit(ClothesCategory $clothes_category)
    {
        $data = $clothes_category;
        $costs = Cost::all()->pluck('title', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.clothes_category.edit', compact('data', 'costs','gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateClothesCategory $request
     * @param ClothesCategory $clothes_category
     * @return RedirectResponse
     */
    public function update(AdminUpdateClothesCategory $request,ClothesCategory $clothes_category)
    {
        if ($clothes_category->update($request->validated()))
        {
            $clothes_category->costs()->sync($request->get('cost_id'));
            return redirect()->route('clothes-categories.index');
        }
    }
}
