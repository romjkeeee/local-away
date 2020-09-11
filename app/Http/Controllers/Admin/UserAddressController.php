<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserAddressController extends Controller
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
        $data = UserAddress::query()->with('user')->get();
        return view('admin.pages.user_address.index', compact('data'));
    }
}
