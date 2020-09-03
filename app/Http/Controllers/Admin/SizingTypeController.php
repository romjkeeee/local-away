<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizingType;
use App\Http\Requests\AdminUpdateSizingType;
use App\Sizing;
use App\SizingCategory;
use App\SizingGuide;
use App\SizingType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingTypeController extends Controller
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
        $data = SizingType::all();
        return view('admin.pages.sizing_type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $sizing_category = SizingCategory::query()->where('active',true)->get()->pluck('title', 'id');
        $sizes = Sizing::all();
        return view('admin.pages.sizing_type.create', compact('sizing_category', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(AdminStoreSizingType $request)
    {
        $sizing_type = SizingType::query()->create($request->validated());
        $sizing_type->sizings()->attach($request->get('sizing_id'));
        return redirect()->route('sizing-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param SizingType $sizing_type
     * @return Application|Factory|View
     */
    public function show(SizingType $sizing_type)
    {
        $data = $sizing_type;
        return view('admin.pages.sizing_type.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SizingType $sizing_type
     * @return Application|Factory|View
     */
    public function edit(SizingType $sizing_type)
    {
        $data = $sizing_type;
        $sizing_category = SizingCategory::query()->where('active',true)->get()->pluck('title', 'id');
        $sizes = Sizing::all();
        return view('admin.pages.sizing_type.edit', compact('data','sizing_category','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateSizingType $request
     * @param SizingType $sizing_type
     * @return RedirectResponse
     */
    public function update(AdminUpdateSizingType $request,SizingType $sizing_type)
    {
        if ($sizing_type->update($request->validated()))
        {
            $sizing_type->sizings()->sync($request->get('sizing_id'));
            return redirect()->route('sizing-type.index');
        }
    }
}
