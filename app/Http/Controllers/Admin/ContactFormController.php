<?php

namespace App\Http\Controllers\Admin;

use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateContactForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactFormController extends Controller
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
        $data = ContactForm::all();
        return view('admin.pages.contact_form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.contact_form.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContactForm $contact_form
     * @return Application|Factory|View
     */
    public function edit(ContactForm $contact_form)
    {
        $data = $contact_form;
        return view('admin.pages.contact_form.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateContactForm $request
     * @param ContactForm $contact_form
     * @return RedirectResponse
     */
    public function update(AdminUpdateContactForm $request, ContactForm $contact_form)
    {
        if ($contact_form->update($request->validated()))
        {
            return redirect()->route('contact-form.index');
        }
    }
}
