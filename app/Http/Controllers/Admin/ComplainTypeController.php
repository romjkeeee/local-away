<?php

namespace App\Http\Controllers\Admin;

use App\ComplainType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComplainTypeRequest;
use App\Http\Requests\Admin\UpdateComplainTypeRequest;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComplainTypeController extends Controller
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
        $data = ComplainType::all();
        return view('admin.pages.complain_type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.complain_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreComplainTypeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreComplainTypeRequest $request)
    {
        $complain_type = new ComplainType($request->validated());
        $complain_type->save();
        return redirect()->route('complain-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ComplainType $complain_type
     * @return Application|Factory|View
     */
    public function show(ComplainType $complain_type)
    {
        $data = $complain_type;
        return view('admin.pages.complain_type.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ComplainType $complain_type
     * @return Application|Factory|View
     */
    public function edit(ComplainType $complain_type)
    {
        $data = $complain_type;
        return view('admin.pages.complain_type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateComplainTypeRequest $request
     * @param ComplainType $complain_type
     * @return RedirectResponse
     */
    public function update(UpdateComplainTypeRequest $request, ComplainType $complain_type)
    {
        if ($complain_type->update($request->validated()))
        {
            return redirect()->route('complain-types.index');
        }
    }
}
