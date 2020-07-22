<?php

namespace App\Http\Controllers\Admin;

use App\BodyType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBodyType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BodyTypeController extends Controller
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
        $data = BodyType::all();
        return view('admin.pages.body_type.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.body_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreBodyType $request
     * @return RedirectResponse
     */
    public function store(AdminStoreBodyType $request)
    {
        $travel = BodyType::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('body-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param BodyType $body_type
     * @return Application|Factory|View
     */
    public function show(BodyType $body_type)
    {
        $data = $body_type;
        return view('admin.pages.body_type.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BodyType $body_type
     * @return Application|Factory|View
     */
    public function edit(BodyType $body_type)
    {
        $data = $body_type;
        return view('admin.pages.body_type.edit', compact('data'));
    }
}
