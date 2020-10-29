<?php

namespace App\Services;

use App\Order;
use Shippo;
use App\User;
use App\Product;
use Shippo_Address;
use Shippo_Shipment;
use Shippo_Transaction;
use Illuminate\Http\Request;

class Mail
{
    protected $password;
    protected $user_sputnik;

    public function __construct()
    {
        $this->password = env('ESPUTNIK_PASSWORD');
        $this->user_sputnik = 'secret';
    }

    public function send_request($url, $json_value) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_USERPWD, $this->user_sputnik.':'.$this->password);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_SSLVERSION, 6);
        $output = curl_exec($ch);
        curl_close($ch);
        dd($output);
    }
}
