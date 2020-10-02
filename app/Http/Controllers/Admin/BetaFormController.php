<?php

namespace App\Http\Controllers\Admin;

use App\BetaForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBetaFormRequest;
use App\Http\Requests\Admin\UpdateBetaFormRequest;
use Illuminate\Http\Request;

class BetaFormController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = BetaForm::all();
        return view('admin.pages.beta_form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.beta-form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBetaFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBetaFormRequest $request)
    {
        if (BetaForm::query()->create($request->validated())){
            return redirect()->route('beta-forms.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(BetaForm $beta_form)
    {
        $data = $beta_form;
        return view('admin.pages.beta-form.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BetaForm $beta_form)
    {
        $data = $beta_form;
        return view('admin.pages.beta-form.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBetaFormRequest $request
     * @param BetaForm $beta_form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBetaFormRequest $request, BetaForm $beta_form)
    {
        if ($beta_form->update($request->validated()))
        {
            return redirect()->route('beta-forms.index');
        }
    }
}
