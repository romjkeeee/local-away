<?php


namespace App\Http\Controllers\Api\V1;


use App\ContactForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactFormRequest;
use App\Services\Mail;

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
        $message_id = '2372575';
        $send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';
        $json_value = new \stdClass();
        $json_value->recipients = array(array('email'=>$request->email));
        $mailing = new Mail();
        $mailing->send_request($send_message_url, $json_value);
        return response([
            'status' => 'success',
            'data' => ContactForm::query()->create($request->validated())],
            201);
    }
}
