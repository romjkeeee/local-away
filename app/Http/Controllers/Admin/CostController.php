<?php

namespace App\Http\Controllers\Admin;

use App\Cost;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCosts;
use App\Http\Requests\AdminUpdateCosts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CostController extends Controller
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
        $data = Cost::all();
        return view('admin.pages.cost.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.cost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreCosts $request
     * @return RedirectResponse
     */
    public function store(AdminStoreCosts $request)
    {
        if (Cost::query()->create($request->validated())) {
            return redirect()->route('costs.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Cost $cost
     * @return Application|Factory|View
     */
    public function show(Cost $cost)
    {
        $data = $cost;
        return view('admin.pages.cost.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cost $cost
     * @return Application|Factory|View
     */
    public function edit(Cost $cost)
    {
        $data = $cost;
        return view('admin.pages.cost.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateCosts $request
     * @param Cost $cost
     * @return RedirectResponse
     */
    public function update(AdminUpdateCosts $request,Cost $cost)
    {
        if ($cost->update($request->validated()))
        {
            return redirect()->route('costs.index');
        }
    }
}
