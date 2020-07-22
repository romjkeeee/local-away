<?php

namespace App\Http\Controllers\Admin;

use App\ClothesCategory;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClothesCategoryController extends Controller
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
        $data = ClothesCategory::all();
        return view('admin.pages.clothes_category.index', compact('data'));
    }
}
