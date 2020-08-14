<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePackageType;
use App\Http\Requests\AdminUpdatePackageType;
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
        $package_types = PackageType::query()->with('gender')->get();
        return view('admin.pages.package_types.index', compact('package_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.package_types.create',compact('gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStorePackageType $request
     * @return RedirectResponse
     */
    public function store(AdminStorePackageType $request)
    {
        $package = PackageType::query()->create($request->validated());
        if ($request->file('image')) {
            $package->image = $request->file('image')->store('package_type');
            $package->update();
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
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.package_types.edit', compact('data','gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdatePackageType $request
     * @param PackageType $package_type
     * @return RedirectResponse
     */
    public function update(AdminUpdatePackageType $request, PackageType $package_type)
    {
        if ($package_type->update($request->validated()))
        {
            if ($request->file('image')) {
                $package_type->image = $request->file('image')->store('package_type');
                $package_type->update();
            }
            return redirect()->route('package-types.index');
        }
    }
}
