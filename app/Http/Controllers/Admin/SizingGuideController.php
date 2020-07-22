<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizingGuides;
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
        $this->middleware('role:admin|user');
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
        $sizing_category = SizingCategory::get()->pluck('title', 'id');
        return view('admin.pages.sizing_guide.create',compact('sizing_category'));
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
        return view('admin.pages.sizing_guide.edit', compact('data'));
    }
}
