<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SizingType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingTypeController extends Controller
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
        $data = SizingType::all();
        return view('admin.pages.sizing_type.index', compact('data'));
    }
}
