<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Requests\v2\CreateSubscribeRequest;
use App\Services\Mail;
use App\Subscribe;

class SubscribeController
{
    public function create(CreateSubscribeRequest $request)
    {
        $message_id = '2368935';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$request->email));
        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);

        return response([
            'status' => 'success',
            'data' => Subscribe::query()->create($request->validated()),
            'message' => 'You success subscribe.'
        ], 201);
    }
}
