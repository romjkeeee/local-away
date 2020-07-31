<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\QaForm;
use Illuminate\Http\Request;

class QaFormController extends Controller
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
        $data = QaForm::query()->get();
        return view('admin.pages.qa-form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.qa-form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreQaRequest $request
     * @return RedirectResponse
     */
    public function store(AdminStoreQaRequest $request)
    {
        $qa = Qa::query()->create($request->validated());
        if ($request->file('location_image')) {
            $qa->location_image = $request->file('location_image')->store('qas');
            $qa->update();
        }
        if ($request->file('lead_image')) {
            $qa->lead_image = $request->file('lead_image')->store('qas');
            $qa->update();
        }
        return redirect()->route('qa-forms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param QaForm $qa_form
     * @return Application|Factory|View
     */
    public function show(QaForm $qa_form)
    {
        $data = $qa_form;
        return view('admin.pages.qa-form.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param QaForm $qa_form
     * @return Application|Factory|View
     */
    public function edit(QaForm $qa_form)
    {
        $data = $qa_form;
        return view('admin.pages.qa-form.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdatePersonalStyle $request
     * @param PersonalStyle $personal_style
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdatePersonalStyle $request, QaForm $qa_form)
    {
        if ($qa_form->update($request->validated()))
        {
            return redirect()->route('qa-forms.index');
        }
    }
}
