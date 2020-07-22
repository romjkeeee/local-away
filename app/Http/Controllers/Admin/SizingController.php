<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sizing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizingController extends Controller
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
        $data = Sizing::all();
        return view('admin.pages.personal_style.index', compact('data'));
    }
}
