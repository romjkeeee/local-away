<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreSizing;
use App\Sizing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingController extends Controller
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
        $data = Sizing::all();
        return view('admin.pages.sizing.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.sizing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreSizing $request
     * @return RedirectResponse
     */
    public function store(AdminStoreSizing $request)
    {
        Sizing::query()->create($request->validated());
        return redirect()->route('sizing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Sizing $sizing
     * @return Application|Factory|View
     */
    public function show(Sizing $sizing)
    {
        $data = $sizing;
        return view('admin.pages.sizing.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sizing $sizing
     * @return Application|Factory|View
     */
    public function edit(Sizing $sizing)
    {
        $data = $sizing;
        return view('admin.pages.sizing.edit', compact('data'));
    }
}
