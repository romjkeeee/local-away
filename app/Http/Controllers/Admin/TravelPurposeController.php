<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreTravelPurpose;
use App\Http\Requests\AdminStoreUser;
use App\Http\Requests\AdminUpdateTravelPurpose;
use App\TravelPurpose;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TravelPurposeController extends Controller
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
        $data = TravelPurpose::all();
        return view('admin.pages.travel_purposes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.travel_purposes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreTravelPurpose $request
     * @return RedirectResponse
     */
    public function store(AdminStoreTravelPurpose $request)
    {
        $travel = TravelPurpose::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('travel_purpose');
            $travel->update();
        }
        return redirect()->route('travel-purposes.index');
    }


    /**
     * Display the specified resource.
     *
     * @param TravelPurpose $travel_purpose
     * @return Application|Factory|View
     */
    public function show(TravelPurpose $travel_purpose)
    {
        $data = $travel_purpose;
        return view('admin.pages.travel_purposes.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TravelPurpose $travel_purpose
     * @return Application|Factory|View
     */
    public function edit(TravelPurpose $travel_purpose)
    {
        $data = $travel_purpose;
        return view('admin.pages.travel_purposes.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateTravelPurpose $request
     * @param TravelPurpose $travel_purpose
     * @return RedirectResponse
     */
    public function update(AdminUpdateTravelPurpose $request,TravelPurpose $travel_purpose)
    {
        if ($travel_purpose->update($request->validated()))
        {
            if ($request->file('image')) {
                $travel_purpose->image = $request->file('image')->store('travel-purpose');
                $travel_purpose->update();
            }
            return redirect()->route('travel-purposes.index');
        }
    }
}
