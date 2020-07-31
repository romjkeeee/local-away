<?php


namespace App\Http\Controllers\Api\V1;


use App\City;
use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\CreateQaFormRequest;
use App\Qa;
use App\QaForm;

/**
 * @group Q&A
 *
 * APIs for
 */
class QaController extends Controller
{
    /**
     * Create
     * Qa request
     * @bodyParam email string require
     *
     * @response 201
     *
     */
    public function create(CreateQaFormRequest $request, $id)
    {
        return response(QaForm::query()->create(['qa_id' => $id, 'email' => $request->email]), 201);
    }

    /**
     * List cities
     *
     * @response 200
     *
     */
    public function cities_list()
    {
        return response(City::query()->where('status',true)->get());
    }

    /**
     * Show qa by id city
     * @queryParam id integer required
     *
     * @response 200
     *
     */
    public function show($id)
    {
        return response(Qa::query()->where('city_id',$id)->first());
    }
}
