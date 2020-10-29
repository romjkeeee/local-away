<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\CreateSubscribeRequest;
use App\Services\Mail;
use App\Subscribe;

/**
 * @group Subscribe
 *
 * APIs for
 */
class SubscribeController extends Controller
{
    /**
     * Create
     * Subscribe
     * @bodyParam email string require
     *
     * @response 201
     *
     * @param CreateSubscribeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function create(CreateSubscribeRequest $request)
    {
        $message_id = '2368688';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$request->email));
        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);

        return response([
            'status' => 'success',
            'data' => Subscribe::query()->create($request->validated())
        ], 201);
    }
}
