<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizingCategory;
use App\Http\Requests\AdminUpdateSizingCategory;
use App\Sizing;
use App\SizingCategory;
use App\SizingType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingCategoryController extends Controller
{
    function __construct() {
        $this->middleware('role:admin|user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = SizingCategory::all();
        return view('admin.pages.sizing_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $sizes_types = SizingType::all()->pluck('title','id');
        $gender = Gender::all()->pluck('title','id');
        return view('admin.pages.sizing_category.create', compact('sizes_types','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreSizingCategory $request
     * @return RedirectResponse
     */
    public function store(AdminStoreSizingCategory $request)
    {
        $travel = SizingCategory::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('sizing-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param SizingCategory $sizing_category
     * @return Application|Factory|View
     */
    public function show(SizingCategory $sizing_category)
    {
        $data = $sizing_category;
        return view('admin.pages.sizing_category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SizingCategory $sizing_category
     * @return Application|Factory|View
     */
    public function edit(SizingCategory $sizing_category)
    {
        $data = $sizing_category;
        return view('admin.pages.sizing_category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateSizingCategory $request
     * @param SizingCategory $sizing_category
     * @return RedirectResponse
     */
    public function update(AdminUpdateSizingCategory $request, SizingCategory $sizing_category)
    {
        if ($sizing_category->update($request->validated()))
        {
            if ($request->file('image')) {
                $sizing_category->image = $request->file('image')->store('sizing-category');
                $sizing_category->update();
            }
            return redirect()->route('sizing-categories.index');
        }
    }
}
