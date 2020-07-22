<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SizingGuide;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class SizingGuideController extends Controller
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
        $data = SizingGuide::all();
        return view('admin.pages.sizing_guide.index', compact('data'));
    }
}
