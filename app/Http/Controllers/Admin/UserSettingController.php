<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserPreference;
use App\UserSetting;
use Illuminate\Http\Request;

class UserSettingController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $preference = array(
            'measurement' => [
                [
                    'id' => 1,
                    'name' => 'imperial'
                ],
                [
                    'id' => 2,
                    'name' => 'metric'
                ],
            ],
            'age' => [
                [
                    'id' => 1,
                    'name' => '18-20'
                ],
                [
                    'id' => 2,
                    'name' => '20-25'
                ],
                [
                    'id' => 3,
                    'name' => '25-30'
                ],
                [
                    'id' => 4,
                    'name' => '30-35'
                ],
                [
                    'id' => 5,
                    'name' => '35+'
                ],
            ],
            'feet' => [
                [
                    'id' => 1,
                    'measurement_id' => 2,
                    'name' => '35'
                ],
                [
                    'id' => 2,
                    'measurement_id' => 2,
                    'name' => '36'
                ],
                [
                    'id' => 3,
                    'measurement_id' => 2,
                    'name' => '37'
                ],
                [
                    'id' => 4,
                    'measurement_id' => 2,
                    'name' => '38'
                ],
                [
                    'id' => 5,
                    'measurement_id' => 2,
                    'name' => '39'
                ],
                [
                    'id' => 6,
                    'measurement_id' => 2,
                    'name' => '40'
                ],
                [
                    'id' => 7,
                    'measurement_id' => 2,
                    'name' => '41'
                ],
                [
                    'id' => 8,
                    'measurement_id' => 2,
                    'name' => '42'
                ],
                [
                    'id' => 9,
                    'measurement_id' => 1,
                    'name' => '5.5'
                ],
                [
                    'id' => 10,
                    'measurement_id' => 1,
                    'name' => '6'
                ],
                [
                    'id' => 11,
                    'measurement_id' => 1,
                    'name' => '6.5'
                ],
                [
                    'id' => 12,
                    'measurement_id' => 1,
                    'name' => '7'
                ],
                [
                    'id' => 13,
                    'measurement_id' => 1,
                    'name' => '7.5'
                ],
                [
                    'id' => 14,
                    'measurement_id' => 1,
                    'name' => '8'
                ],
                [
                    'id' => 15,
                    'measurement_id' => 1,
                    'name' => '8.5'
                ],
                [
                    'id' => 16,
                    'measurement_id' => 1,
                    'name' => '9'
                ],
                [
                    'id' => 17,
                    'measurement_id' => 1,
                    'name' => '9.5'
                ],
                [
                    'id' => 18,
                    'measurement_id' => 1,
                    'name' => '10'
                ],
                [
                    'id' => 19,
                    'measurement_id' => 1,
                    'name' => '10.5'
                ],
                [
                    'id' => 20,
                    'measurement_id' => 1,
                    'name' => '11'
                ],
                [
                    'id' => 21,
                    'measurement_id' => 1,
                    'name' => '11.5'
                ],
            ],
        );
        $data = UserPreference::query()->with('bodyType')->get();
        return view('admin.pages.user_settings.index', compact('data', 'preference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\UserSetting $userSetting
     * @return \Illuminate\Http\Response
     */
    public function show(UserPreference $user_setting)
    {
        $data = $user_setting;
        return view('admin.pages.user_settings.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\UserSetting $userSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSetting $userSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\UserSetting $userSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSetting $userSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\UserSetting $userSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSetting $userSetting)
    {
        //
    }
}
