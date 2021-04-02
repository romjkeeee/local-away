<?php


namespace App\Http\Controllers\Api\v2;


use App\Http\Resources\v2\DestinationSearchCollection;
use App\Qa;
use App\TravelStory;
use Illuminate\Http\Request;

class DestinationController
{
    public function index(Request $request)
    {
        $destinations = Qa::query()
            ->where('status',1);
        if ($request->letter) {
            $destinations->where('name', 'LIKE', $request->letter . '%');
        }

        if ($request->q)
        {
            $destinations->where('name', 'LIKE', '%' . $request->q . '%');
        }
        $data = $destinations->paginate($request->perPage ?? 10);
        return response()->json([
            'status' => 'success',
            'data' => DestinationSearchCollection::collection($data->items()),
            'pagination' => [
                'perPage' => $data->perPage(),
                'currentPage' => $data->currentPage(),
                'lastPage' => $data->lastPage(),
                'total' => $data->total()
            ]
        ]);
    }
}
