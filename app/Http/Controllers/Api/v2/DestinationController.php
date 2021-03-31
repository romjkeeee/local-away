<?php


namespace App\Http\Controllers\Api\v2;


use App\Qa;
use App\TravelStory;
use Illuminate\Http\Request;

class DestinationController
{
    public function index(Request $request)
    {
        $destinations = Qa::query();
        if ($request->letter) {
            $destinations->where('alias', 'LIKE', $request->letter . '%');
        }

        if ($request->q)
        {
            $destinations->where('alias', 'LIKE', '%' . $request->q . '%');
        }
        $data = $destinations->paginate();
        return response()->json([
            'status' => 'success',
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'currentPage' => $data->currentPage(),
                'next_page' => $data->nextPageUrl(),
                'prev_page' => $data->previousPageUrl(),
            ]
        ]);
    }
}
