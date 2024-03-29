<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizingGuides;
use App\Http\Requests\AdminUpdateSizingGuide;
use App\SizingCategory;
use App\SizingGuide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class SizingGuideController extends Controller
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
        $data = SizingGuide::query()->with('sizing_category')->get();
        return view('admin.pages.sizing_guide.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $sizing_category = SizingCategory::all()->pluck('title', 'id');
        $gender = Gender::all()->pluck('title','id');
        return view('admin.pages.sizing_guide.create',compact('sizing_category', 'gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreSizingGuides $request
     * @return RedirectResponse
     */
    public function store(AdminStoreSizingGuides $request)
    {
        $travel = SizingGuide::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('sizing-guides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param SizingGuide $sizing_guide
     * @return Application|Factory|View
     */
    public function show(SizingGuide $sizing_guide)
    {
        $data = $sizing_guide;
        return view('admin.pages.sizing_guide.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SizingGuide $sizing_guide
     * @return Application|Factory|View
     */
    public function edit(SizingGuide $sizing_guide)
    {
        $data = $sizing_guide;
        $sizing_category = SizingCategory::get()->pluck('title', 'id');
        $gender = Gender::all()->pluck('title','id');
        return view('admin.pages.sizing_guide.edit', compact('data','sizing_category', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateSizingGuide $request
     * @param SizingGuide $sizing_guide
     * @return RedirectResponse
     */
    public function update(AdminUpdateSizingGuide $request, SizingGuide $sizing_guide)
    {
        if ($sizing_guide->update($request->validated()))
        {
            if ($request->file('image')) {
                $sizing_guide->image = $request->file('image')->store('sizing-guide');
                $sizing_guide->update();
            }
            return redirect()->route('sizing-guides.index');
        }
    }
}
