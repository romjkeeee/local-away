<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Shipping;
use Illuminate\Http\Request;

class ShippoController extends Controller
{
    public function webhook(Request $request)
    {
        $data = json_encode($request->all());
        $shippo = \App\Shipping::query()->create(['data'=>$data]);
    }
}
