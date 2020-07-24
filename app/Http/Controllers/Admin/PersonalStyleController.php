<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePersonalStyle;
use App\Http\Requests\AdminUpdatePersonalStyle;
use App\PersonalStyle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PersonalStyleController extends Controller
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
        $data = PersonalStyle::all();
        return view('admin.pages.personal_style.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.personal_style.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStorePersonalStyle $request
     * @return RedirectResponse
     */
    public function store(AdminStorePersonalStyle $request)
    {
        $travel = PersonalStyle::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('personal-style.index');
    }

    /**
     * Display the specified resource.
     *
     * @param PersonalStyle $personal_style
     * @return Application|Factory|View
     */
    public function show(PersonalStyle $personal_style)
    {
        $data = $personal_style;
        return view('admin.pages.personal_style.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PersonalStyle $personal_style
     * @return Application|Factory|View
     */
    public function edit(PersonalStyle $personal_style)
    {
        $data = $personal_style;
        return view('admin.pages.personal_style.edit', compact('data'));
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
