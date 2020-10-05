<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MeasurementRequestStore;
use App\Http\Requests\Admin\MeasurementRequestUpdate;
use App\Measurement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeasurementController extends Controller
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
        $data = Measurement::all();
        return view('admin.pages.measurements.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.measurements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeasurementRequestStore $request)
    {
        if (Measurement::query()->create($request->validated())){
            return redirect()->route('measurements.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        $data = $measurement;
        return view('admin.pages.measurements.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        $data = $measurement;
        return view('admin.pages.measurements.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(MeasurementRequestUpdate $request, Measurement $measurement)
    {
        if ($measurement->update($request->validated()))
        {
            return redirect()->route('measurements.index');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        //
    }
}
