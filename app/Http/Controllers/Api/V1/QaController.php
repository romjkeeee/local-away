<?php


namespace App\Http\Controllers\Api\V1;


use App\City;
use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\CreateQaFormRequest;
use App\Http\Resources\QaCollection;
use App\Qa;
use App\QaForm;
use Illuminate\Http\Request;

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
    public function create(CreateQaFormRequest $request)
    {
        return response(['status' => 'success', 'data' => QaForm::query()->create(['qa_id' => $request->qa_id, 'email' => $request->email])],201);
    }

    /**
     * List cities
     *
     * @response 200
     *
     */
    public function cities_list()
    {
        return response(['status' => 'success', 'data' => QaCollection::make(Qa::query()->get())]);
    }

    /**
     * Show qa by id city
     * @queryParam id integer required
     *
     * @response 200
     *
     */
    public function show($alias)
    {
        return response([
            'status' => 'success',
            'data' => \App\Http\Resources\QaShow::make(Qa::query()->where('alias', $alias)->first())
        ]);
    }
}
