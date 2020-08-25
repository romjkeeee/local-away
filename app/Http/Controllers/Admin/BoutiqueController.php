<?php

namespace App\Http\Controllers\Admin;

use App\Boutique;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreGender;
use App\Http\Requests\AdminUpdateGender;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class BoutiqueController extends Controller
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
        $data = Boutique::all();
        return view('admin.pages.boutique.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.boutique.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreGender $request
     * @return RedirectResponse
     */
    public function store(AdminStoreGender $request)
    {
        if (Boutique::query()->create($request->validated())) {
            return redirect()->route('boutiques.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Gender $gender
     * @return Application|Factory|View
     */
    public function show(Boutique $boutique)
    {
        $data = $boutique;
        return view('admin.pages.boutique.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gender $gender
     * @return Application|Factory|View
     */
    public function edit(Boutique $boutique)
    {
        $data = $boutique;
        return view('admin.pages.boutique.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateGender $request
     * @param Gender $gender
     * @return RedirectResponse
     */
    public function update(AdminUpdateGender $request, Boutique $boutique)
    {
        if ($boutique->update($request->validated()))
        {
            return redirect()->route('boutiques.index');
        }
    }
}
