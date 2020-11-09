<?php

namespace App\Http\Controllers\Admin;

use App\Height;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeightMetricUpdateReqeust;
use App\Http\Requests\Admin\HeightStoreReqeust;
use App\Http\Requests\Admin\HeightUpdateReqeust;
use App\Measurement;
use Illuminate\Http\Request;

class HeightController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Height::all();
        return view('admin.pages.height.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measurement = Measurement::query()->get()->pluck('name','id');
        return view('admin.pages.height.create', compact('measurement'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeightStoreReqeust $request)
    {
        Height::query()->create($request->validated());
        return redirect()->route('heights.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function show(Height $height)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function edit(Height $height)
    {
        $data = $height;
        $measurement = Measurement::query()->get()->pluck('name','id');
        return view('admin.pages.height.edit', compact('data', 'measurement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function update(HeightUpdateReqeust $request, Height $height)
    {
        if ($height->update($request->validated()))
        {
            return redirect()->route('heights.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function destroy(Height $height)
    {
        //
    }
}
