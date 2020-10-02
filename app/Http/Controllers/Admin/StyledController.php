<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreStyled;
use App\Http\Requests\AdminUpdateStyled;
use App\Styled;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class StyledController extends Controller
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
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.styled.create', compact('gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreStyled $request
     * @return RedirectResponse
     */
    public function store(AdminStoreStyled $request)
    {
        $travel = Styled::query()->create($request->validated());
        if ($request->file('image')) {
            $travel->image = $request->file('image')->store('package_type');
            $travel->update();
        }
        return redirect()->route('styled.index');
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
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.styled.edit', compact('data', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Styled $styled
     * @return RedirectResponse
     */
    public function update(AdminUpdateStyled $request,Styled $styled)
    {
        if ($styled->update($request->validated()))
        {
            if ($request->file('image')) {
                $styled->image = $request->file('image')->store('styled');
                $styled->update();
            }
            return redirect()->route('styled.index');
        }
    }
}
