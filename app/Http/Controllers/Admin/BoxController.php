<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditBoxRequest;
use App\Http\Requests\AdminUpdateBodyType;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Box::all();
        return view('admin.pages.box.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Box  $box
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Box $box)
    {
        $data = $box;
        return view('admin.pages.box.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Box  $box
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Box $box)
    {
        $data = $box;
        return view('admin.pages.box.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Box  $box
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditBoxRequest $request, Box $box)
    {
        if ($box->update($request->validated()))
        {
            if ($request->file('image')) {
                $box->image = $request->file('image')->store('body-type');
                $box->update();
            }
            return redirect()->route('boxs.index');
        }
    }
}
