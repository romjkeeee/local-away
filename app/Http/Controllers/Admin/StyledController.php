<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Styled;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class StyledController extends Controller
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
        $data = Styled::all();
        return view('admin.pages.styled.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.styled.create');
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
     * @param Styled $styled
     * @return Application|Factory|View
     */
    public function show(Styled $styled)
    {
        $data = $styled;
        return view('admin.pages.styled.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Styled $styled
     * @return Application|Factory|View
     */
    public function edit(Styled $styled)
    {
        $data = $styled;
        return view('admin.pages.personal_style.edit', compact('data'));
    }
}
