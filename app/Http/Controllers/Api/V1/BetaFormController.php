<?php

namespace App\Http\Controllers\Api\V1;

use App\BetaForm;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBetaFormRequest;
use Illuminate\Http\Request;

/**
 * @group Beta Form
 *
 * APIs for
 */
class BetaFormController extends Controller
{
    /**
     * Create
     * @bodyParam email string required
     *
     * @response 201
     */
    public function store(StoreBetaFormRequest $request)
    {
        return response([
            'status'=>'success',
            'data' => BetaForm::query()->create($request->validated())
        ]);
    }
}
