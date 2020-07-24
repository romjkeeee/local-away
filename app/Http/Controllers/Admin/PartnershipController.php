<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizing;
use App\Http\Requests\AdminUpdateSizing;
use App\Partnership;
use App\Sizing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnershipController extends Controller
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
        $data = Partnership::all();
        return view('admin.pages.partnership.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.partnership.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Partnership $partnership
     * @return Application|Factory|View
     */
    public function show(Partnership $partnership)
    {
        $data = $partnership;
        return view('admin.pages.partnership.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partnership $partnership
     * @return Application|Factory|View
     */
    public function edit(Partnership $partnership)
    {
        $data = $partnership;
        return view('admin.pages.partnership.edit', compact('data'));
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
            return redirect()->route('partnership.index');
        }
    }
}
