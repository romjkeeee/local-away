<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Country::all();
        return view('admin.pages.country.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCountryRequest $request)
    {
        if (Country::query()->create($request->validated())) {
            return redirect()->route('countries.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Country $country)
    {
        $data = $country;
        return view('admin.pages.country.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return Application|Factory|View
     */
    public function edit(Country $country)
    {
        $data = $country;
        return view('admin.pages.country.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $request
     * @param Country $country
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        if ($country->update($request->validated()))
        {
            return redirect()->route('countries.index');
        }
    }
}
