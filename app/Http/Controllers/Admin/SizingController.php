<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizing;
use App\Http\Requests\AdminUpdateSizing;
use App\Sizing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingController extends Controller
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
        $data = Sizing::all();
        return view('admin.pages.sizing.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.sizing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreSizing $request
     * @return RedirectResponse
     */
    public function store(AdminStoreSizing $request)
    {
        Sizing::query()->create($request->validated());
        return redirect()->route('sizing.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sizing $sizing
     * @return Application|Factory|View
     */
    public function edit(Sizing $sizing)
    {
        $data = $sizing;
        return view('admin.pages.sizing.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateSizing $request
     * @param Sizing $sizing
     * @return RedirectResponse
     */
    public function update(AdminUpdateSizing $request, Sizing $sizing)
    {
        if ($sizing->update($request->validated()))
        {
            return redirect()->route('sizing.index');
        }
    }
}
