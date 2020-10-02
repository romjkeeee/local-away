<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreGender;
use App\Http\Requests\AdminUpdateGender;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class GenderController extends Controller
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
        $data = Gender::all();
        return view('admin.pages.genders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.genders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreGender $request
     * @return RedirectResponse
     */
    public function store(AdminStoreGender $request)
    {
        if (Gender::query()->create($request->validated())) {
            return redirect()->route('genders.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Gender $gender
     * @return Application|Factory|View
     */
    public function show(Gender $gender)
    {
        $data = $gender;
        return view('admin.pages.genders.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gender $gender
     * @return Application|Factory|View
     */
    public function edit(Gender $gender)
    {
        $data = $gender;
        return view('admin.pages.genders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateGender $request
     * @param Gender $gender
     * @return RedirectResponse
     */
    public function update(AdminUpdateGender $request, Gender $gender)
    {
        if ($gender->update($request->validated()))
        {
            return redirect()->route('genders.index');
        }
    }
}
