<?php

namespace App\Http\Controllers\Admin;

use App\Feet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeetRequestStore;
use App\Http\Requests\Admin\FeetRequestUpdate;
use App\Measurement;
use Illuminate\Http\Request;

class FeetController extends Controller
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
        $data = Feet::all();
        return view('admin.pages.feet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measurement = Measurement::query()->where('active', true)->get()->pluck('name','id');
        return view('admin.pages.feet.create', compact('measurement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeetRequestStore $request)
    {
        if (Feet::query()->create($request->validated())){
            return redirect()->route('feets.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show(Feet $feet)
    {
        $data = $feet;
        return view('admin.pages.feet.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit(Feet $feet)
    {
        $data = $feet;
        $measurement = Measurement::query()->where('active', true)->get()->pluck('name','id');
        return view('admin.pages.feet.edit', compact('measurement', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(FeetRequestUpdate $request, Feet $feet)
    {
        if ($feet->update($request->validated()))
        {
            return redirect()->route('feets.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feet  $feet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feet $feet)
    {
        //
    }
}
