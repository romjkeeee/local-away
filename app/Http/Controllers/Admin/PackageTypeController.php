<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePackageType;
use App\PackageType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageTypeController extends Controller
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
        $data = PackageType::all();
        return view('admin.pages.package_types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.package_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStorePackageType $request
     * @return RedirectResponse
     */
    public function store(AdminStorePackageType $request)
    {
        $travel = PackageType::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('package-types.index');
    }


    /**
     * Display the specified resource.
     *
     * @param PackageType $package_type
     * @return Application|Factory|View
     */
    public function show(PackageType $package_type)
    {
        $data = $package_type;
        return view('admin.pages.package_types.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PackageType $package_type
     * @return Application|Factory|View
     */
    public function edit(PackageType $package_type)
    {
        $data = $package_type;
        return view('admin.pages.package_types.edit', compact('data'));
    }
}
