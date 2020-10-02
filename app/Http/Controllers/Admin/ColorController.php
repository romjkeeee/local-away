<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreColor;
use App\Http\Requests\AdminUpdateColor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
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
        $data = Color::all();
        return view('admin.pages.colors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreColor $request
     * @return RedirectResponse
     */
    public function store(AdminStoreColor $request)
    {
        $color = Color::query()->create($request->validated());
        if ($request->file('image')) {
            $color->image = $request->file('image')->store('colors');
            $color->update();
        }
        return redirect()->route('colors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Color $color
     * @return Application|Factory|View
     */
    public function show(Color $color)
    {
        $data = $color;
        return view('admin.pages.colors.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Color $color
     * @return Application|Factory|View
     */
    public function edit(Color $color)
    {
        $data = $color;
        return view('admin.pages.colors.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateColor $request
     * @param Color $color
     * @return RedirectResponse
     */
    public function update(AdminUpdateColor $request, Color $color)
    {
        if ($color->update($request->validated()))
        {
            if ($request->file('image')) {
                $color->image = $request->file('image')->store('body-type');
                $color->update();
            }
            return redirect()->route('colors.index');
        }
    }
}
