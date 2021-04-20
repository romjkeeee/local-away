<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Requests\v2\CreateSubscribeRequest;
use App\Http\Requests\v2\JoinClubRequest;
use App\JoinClub;
use App\Services\Mail;
use App\Subscribe;

class JoinClubController
{
    public function create(JoinClubRequest $request)
    {
        $message_id = '2555181';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$request->email, 'locator' => $request->email, 'jsonParam' => json_encode(array('first_name' => $request->name))));
        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);
        return response([
            'status' => 'success',
            'data' => JoinClub::query()->create($request->validated()),
            'message' => 'You success send request.'
        ], 201);
    }
}
