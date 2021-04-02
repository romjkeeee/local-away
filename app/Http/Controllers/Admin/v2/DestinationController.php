<?php

namespace App\Http\Controllers\Admin\v2;

use App\City;
use App\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\v2\AdminStoreDestination;
use App\Http\Requests\v2\AdminUpdateDestination;
use App\Qa;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = Destination::all();
        return view('admin.pages.destination.index', compact('data'));
    }

    public function create()
    {
        $city = City::all()->pluck('name', 'id');
        return view('admin.pages.destination.create', compact('city'));
    }

    public function store(AdminStoreDestination $request)
    {
        $destination = Destination::query()->create(array_merge($request->all(),['alias' => Str::slug($request->name)]));
        if ($request->file('location_image')) {
            $destination->location_image = $request->file('location_image')->store('destinations');
            $destination->update();
        }
        return redirect()->route('destinations.index');
    }

    public function show(Destination $destination)
    {
        $data = $destination;
        return view('admin.pages.destination.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Destination $destination
     * @return Application|Factory|View
     */
    public function edit(Destination $destination)
    {
        $data = $destination;
        $city = City::all()->pluck('name', 'id');
        return view('admin.pages.destination.edit', compact('data', 'city'));
    }

    public function update(AdminUpdateDestination $request, Destination $destination)
    {
        if ($destination->update(array_merge($request->all(),['alias' => Str::slug($request->name)])))
        {
            if ($request->file('location_image')) {
                $destination->location_image = $request->file('location_image')->store('destinations');
                $destination->update();
            }
            return redirect()->route('destinations.index');
        }
    }
}
