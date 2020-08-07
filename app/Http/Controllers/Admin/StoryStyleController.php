<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\StoryStyle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoryStyleController extends Controller
{
    function __construct() {
        $this->middleware('role:admin|user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = StoryStyle::all();
        return view('admin.pages.story_style.index', compact('data'));
    }
}
