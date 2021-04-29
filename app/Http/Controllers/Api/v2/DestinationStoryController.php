<?php

namespace App\Http\Controllers\Api\v2;

use App\DestinationStory;
use App\Http\Controllers\Controller;
use App\Http\Resources\v2\DestinationStoryCollection;
use Illuminate\Http\Request;

class DestinationStoryController extends Controller
{
    public function index($id)
    {
        $data = DestinationStory::query()
            ->where('destination_id',$id)
            ->where('status',1)
            ->with('subDestinations')
            ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => DestinationStoryCollection::make($data)
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Destination not found'
        ], 404);
    }
}
