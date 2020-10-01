<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WebSiteConfig;
use Illuminate\Http\Request;

class WebSiteConfigController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = WebSiteConfig::all()->pluck('value','key');
        return view('admin.pages.websiteconfig.edit',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        $data = $request->except('submit','_token');
        foreach ($data as $key => $value) {
            WebSiteConfig::query()->where('key', $key)->update(['value' => $value]);
        }
        return view('admin.pages.websiteconfig.edit',compact('data'))->withErrors('Success update');
    }
}
