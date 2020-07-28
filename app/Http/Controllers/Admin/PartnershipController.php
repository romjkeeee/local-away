<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizing;
use App\Http\Requests\AdminUpdatePartnership;
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
     * @param AdminUpdatePartnership $request
     * @param Partnership $partnership
     * @return RedirectResponse
     */
    public function update(AdminUpdatePartnership $request, Partnership $partnership)
    {
        if ($partnership->update($request->validated()))
        {
            return redirect()->route('partnerships.index');
        }
    }
}
