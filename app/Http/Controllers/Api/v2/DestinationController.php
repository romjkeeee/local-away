<?php


namespace App\Http\Controllers\Api\v2;


use App\Http\Requests\v2\DestinationSearchRequest;
use App\TravelStory;
use Illuminate\Http\Request;

class DestinationController
{
    public function index(DestinationSearchRequest $request)
    {
        $destinations = TravelStory::query()
            ->where('active', 1);
        if ($request->letter) {
            $destinations->where('name', 'LIKE', $request->letter . '%');
        }

        if ($request->query)
        {
            $destinations->where('name', 'LIKE', '%' . $request->query . '%');
        }
        $data = $destinations->paginate();
        return response()->json([
            'status' => 'success',
            'currentPage' => $data->currentPage(),
            'data' => $data->items(),
            'total' => $data->total(),
            'next_page' => $data->nextPageUrl(),
            'prev_page' => $data->previousPageUrl(),
        ]);
    }
}
