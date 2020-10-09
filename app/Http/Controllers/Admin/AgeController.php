<?php

namespace App\Http\Controllers\Admin;

use App\Age;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgesRequestStore;
use App\Http\Requests\Admin\AgesRequestUpdate;
use Illuminate\Http\Request;

class AgeController extends Controller
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
        $data = Age::all();
        return view('admin.pages.age.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.age.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgesRequestStore $request)
    {
        if (Age::query()->create($request->validated())){
            return redirect()->route('ages.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function show(Age $age)
    {
        $data = $age;
        return view('admin.pages.age.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function edit(Age $age)
    {
        $data = $age;
        return view('admin.pages.age.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function update(AgesRequestUpdate $request, Age $age)
    {
        if ($age->update($request->validated()))
        {
            return redirect()->route('ages.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Age  $age
     * @return \Illuminate\Http\Response
     */
    public function destroy(Age $age)
    {
        //
    }
}
