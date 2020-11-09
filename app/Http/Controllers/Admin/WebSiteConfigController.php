<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebSettingUpdateRequest;
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
        $data = WebSiteConfig::get(['title','value','key']);
        return view('admin.pages.websiteconfig.edit',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(WebSettingUpdateRequest $request)
    {
        $request_data = $request->except('submit','_token');
        foreach ($request_data as $key => $value) {
            $data = WebSiteConfig::query()->where('key', $key)->update(['value' => $value]);
        }
        return redirect()->route('web-settings.index')->with(['success' => 'Success update']);
    }
}
