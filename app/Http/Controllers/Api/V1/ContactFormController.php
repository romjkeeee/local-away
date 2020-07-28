<?php


namespace App\Http\Controllers\Api\V1;


use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;

/**
 * @group Contact Form
 *
 * APIs for
 */
class ContactFormController extends Controller
{
    /**
     * Create
     * Contact Form
     * @bodyParam name string require
     * @bodyParam email string require
     * @bodyParam message string require
     *
     * @response 201
     *
     * @param CreateContactFormRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(CreateContactFormRequest $request)
    {
        return response(ContactForm::query()->create($request->validated()), 201);
    }
}
