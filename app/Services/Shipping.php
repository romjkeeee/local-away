<?php

namespace App\Services;

use App\Order;
use Shippo;
use App\User;
use App\Product;
use Shippo_Address;
use Shippo_Shipment;
use Shippo_Transaction;

class Shipping
{
    protected $fromAddress = [
        'object_purpose' => 'PURCHASE',
        'name' => 'Eric Barnes',
        'company' => 'LocalAway inc.',
        'street1' => '814 Mission St.',
        'city' => 'San Francisco',
        'state' => 'CA',
        'zip' => '94105',
        'country' => 'US',
        'phone' => '+1 555 341 9393',
        'email' => 'shippotle@goshippo.com',
    ];

    public function __construct()
    {
        Shippo::setApiKey(env('SHIPPO_PRIVATE'));
    }

    /**
     * Validate an address through Shippo service
     */
    public function validateAddress(User $user)
    {
        $toAddress = $user->userAddress();

        $toAddress['validate'] = true;

        return Shippo_Address::create($toAddress);
    }

    /**
     * Create a Shippo shipping rates
     */
    public function rates(Order $order)
    {
        $toAddress = $order->address();

        $toAddress['object_purpose'] = 'PURCHASE';

        return Shippo_Shipment::create([
            'object_purpose'=> 'PURCHASE',
            'address_from'=> $this->fromAddress,
            'address_to'=> $toAddress,
            'parcel'=> [
                'length'=> '5',
                'width'=> '5',
                'height'=> '5',
                'distance_unit'=> 'in',
                'weight'=> '2',
                'mass_unit'=> 'lb',
            ],
            'insurance_amount'=> '50',
            'insurance_currency'=> 'USD',
            'async'=> false
        ]);
    }

    /**
     * Create the shipping label transaction
     */
    public function createLabel($rateId)
    {
        return Shippo_Transaction::create([
            'rate' => $rateId,
            'label_file_type' => "PDF",
            'async' => false
        ]);
    }
}
