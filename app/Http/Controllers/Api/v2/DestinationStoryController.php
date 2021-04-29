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
            ->with('subDestinations')
            ->get();
        return response()->json([
            'status' => 'success',
            'data' => DestinationStoryCollection::collection($data)
        ]);
    }
}
