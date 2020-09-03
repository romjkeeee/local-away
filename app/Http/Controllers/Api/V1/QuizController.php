<?php

namespace App\Http\Controllers\Api\V1;

use App\BodyType;
use App\ClothesCategory;
use App\Http\Controllers\Controller;
use App\PackageType;
use App\PersonalStyle;
use App\SizingCategory;
use App\Styled;
use App\TravelPurpose;
use Illuminate\Http\Request;

/**
 * @group Quiz
 *
 * APIs for
 */
class QuizController extends Controller
{

    /**
     * List package type
     *
     * @response 200
     *
     */
    public function package_for()
    {
        return response([
            'status' => 'success',
            'data' => PackageType::query()
                ->where('active', true)
                ->get()
        ]);
    }

    /**
     * List travel purposes
     *
     * @response 200
     *
     */
    public function travel_purposes()
    {
        return response([
            'status' => 'success',
            'data' => TravelPurpose::query()
                ->where('active', true)
                ->get()
        ]);
    }

    /**
     * List personal style
     * @queryParam gender_id int optional example: 1
     *
     * @response 200
     *
     */
    public function personal_style(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => PersonalStyle::query()
                ->where('active', true)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->get()
        ]);
    }

    /**
     * List styled
     * @queryParam gender_id int optional example: 1
     *
     * @response 200
     *
     */
    public function styled(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => Styled::query()
                ->where('active', true)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->get()
        ]);
    }

    /**
     * List body type
     * @queryParam gender_id int optional example: 1
     *
     * @response 200
     *
     */
    public function body_type(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => BodyType::query()
                ->where('active', true)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->get()
        ]);
    }

    /**
     * List sizing info
     *
     * @queryParam gender_id int optional example: 1
     *
     * @response 200
     *
     */
    public function sizing_info(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => SizingCategory::query()
                ->where('active', true)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->whereHas('sizing_types.sizings')
                ->with('sizing_types.sizings','sizing_guide')
                ->get()
        ]);
    }

    /**
     * List costs
     * @queryParam gender_id int optional example: 1
     *
     * @response 200
     *
     */
    public function costs(Request $request)
    {
        return response([
            'status' => 'success',
            'data' => ClothesCategory::query()
                ->where('active', true)
                ->when($request->gender_id, function ($query) use ($request) {
                    return $query->where('gender_id', $request->gender_id);
                })
                ->with('costs')
                ->get()
        ]);
    }

    /**
     * List preference
     *
     *
     * @response 200
     *
     */
    public function preference()
    {
        return response([
            'status' => 'success',
            'data' => array(
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
                        'name' => '35'
                    ],
                    [
                        'id' => 2,
                        'name' => '36'
                    ],
                    [
                        'id' => 3,
                        'name' => '37'
                    ],
                    [
                        'id' => 4,
                        'name' => '38'
                    ],
                    [
                        'id' => 5,
                        'name' => '39'
                    ],
                    [
                        'id' => 6,
                        'name' => '40'
                    ],
                    [
                        'id' => 6,
                        'name' => '41'
                    ],
                    [
                        'id' => 7,
                        'name' => '42'
                    ],
                ],
            )
        ]);
    }
}
