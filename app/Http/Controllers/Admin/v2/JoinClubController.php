<?php

namespace App\Http\Controllers\Admin\v2;

use App\Destination;
use App\DestinationStory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\v2\DestinationStoryStoreRequest;
use App\Http\Requests\Admin\v2\DestinationStoryUpdateRequest;
use App\JoinClub;
use Illuminate\Support\Str;

class JoinClubController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = JoinClub::all();
        return view('admin.pages.join_club.index', compact('data'));
    }
}
