<?php

namespace App\Http\Controllers\Admin;

use App\Founder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFounderRequest;
use App\Http\Requests\Admin\UpdateFounderRequest;
use Illuminate\Http\Request;

class FounderController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = Founder::all();
        return view('admin.pages.founders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.founders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFounderRequest $request)
    {
        $founder = Founder::query()->create($request->validated());
        if ($founder) {
            if ($request->file('photo')) {
                $founder->photo = $request->file('photo')->store('founders');
                $founder->update();
            }
            return redirect()->route('founders.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Founder  $founder
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Founder $founder)
    {
        $data = $founder;
        return view('admin.pages.founders.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Founder  $founder
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Founder $founder)
    {
        $data = $founder;
        return view('admin.pages.founders.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Founder  $founder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFounderRequest $request, Founder $founder)
    {
        if ($founder->update($request->validated())) {
            if ($request->file('photo')) {
                $founder->photo = $request->file('photo')->store('founders');
                $founder->update();
            }
            return redirect()->route('founders.index');
        }
    }
}
