<?php

namespace App\Http\Controllers\Admin;

use App\Height;
use App\HeightMetric;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeightMetricStoreReqeust;
use App\Http\Requests\Admin\HeightMetricUpdateReqeust;
use Illuminate\Http\Request;

class HeightMetricController extends Controller
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
        $data = HeightMetric::all();
        return view('admin.pages.height_metric.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heights = Height::query()->get()->pluck('name','id');
        return view('admin.pages.height_metric.create', compact('heights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeightMetricStoreReqeust $request)
    {
        HeightMetric::query()->create($request->validated());
        return redirect()->route('height-metrics.index');

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
    public function edit(HeightMetric $height_metric)
    {
        $data = $height_metric;
        $heights = Height::query()->get()->pluck('name','id');
        return view('admin.pages.height_metric.edit', compact('data', 'heights'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function update(HeightMetricUpdateReqeust $request, HeightMetric $height_metric)
    {
        if ($height_metric->update($request->validated()))
        {
            return redirect()->route('height-metrics.index');
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
