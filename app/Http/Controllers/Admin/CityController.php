<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Color;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreCity;
use App\Http\Requests\AdminStoreColor;
use App\Http\Requests\AdminUpdateCity;
use App\Http\Requests\AdminUpdateColor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
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
        $data = City::all();
        return view('admin.pages.cities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $countries = Country::all()->pluck('name','id');
        return view('admin.pages.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreCity $request
     * @return RedirectResponse
     */
    public function store(AdminStoreCity $request)
    {
        if (City::query()->create($request->validated())){
            return redirect()->route('cities.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function show(City $city)
    {
        $data = $city;
        return view('admin.pages.cities.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function edit(City $city)
    {
        $data = $city;
        $countries = Country::all()->pluck('name','id');
        return view('admin.pages.cities.edit', compact('data', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateCity $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(AdminUpdateCity $request, City $city)
    {
        if ($city->update($request->validated()))
        {
            return redirect()->route('cities.index');
        }
    }
}
