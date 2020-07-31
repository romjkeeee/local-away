<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreQaRequest;
use App\Qa;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QaController extends Controller
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
        $data = Qa::query()->with('city')->get();
        return view('admin.pages.qa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $city = City::all()->pluck('name', 'id');
        return view('admin.pages.qa.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreQaRequest $request
     * @return RedirectResponse
     */
    public function store(AdminStoreQaRequest $request)
    {
        $qa = Qa::query()->create($request->validated());
        if ($request->file('location_image')) {
            $qa->location_image = $request->file('location_image')->store('qas');
            $qa->update();
        }
        if ($request->file('lead_image')) {
            $qa->lead_image = $request->file('lead_image')->store('qas');
            $qa->update();
        }
        return redirect()->route('qas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Qa $qa
     * @return Application|Factory|View
     */
    public function show(Qa $qa)
    {
        $data = $qa;
        return view('admin.pages.qa.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View
     */
    public function edit(Qa $qa)
    {
        $data = $qa;
        $city = City::all()->pluck('name', 'id');
        return view('admin.pages.qa.edit', compact('data', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdatePersonalStyle $request
     * @param PersonalStyle $personal_style
     * @return RedirectResponse
     */
    public function update(AdminUpdatePersonalStyle $request, PersonalStyle $personal_style)
    {
        if ($personal_style->update($request->validated()))
        {
            if ($request->file('image')) {
                $personal_style->image = $request->file('image')->store('personal-style');
                $personal_style->update();
            }
            return redirect()->route('personal-style.index');
        }
    }
}
