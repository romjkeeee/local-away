<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ShowRoomLike;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowRoomLikeController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = ShowRoomLike::all();
        return view('admin.pages.showroom-like.index', compact('data'));
    }

}
