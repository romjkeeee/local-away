<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePartnersipRequest;
use App\Http\Requests\AdminUpdatePartnership;
use App\Partnership;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnershipController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param AdminStorePartnersipRequest $request
     * @return RedirectResponse
     */
    public function store(AdminStorePartnersipRequest $request)
    {
        $travel = Partnership::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('partnership');
            $travel->update();
        }
        return redirect()->route('partnerships.index');
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
            if ($request->file('image')) {
                $partnership->image = $request->file('image')->store('partnership');
                $partnership->update();
            }
            return redirect()->route('partnerships.index');
        }
    }
}
