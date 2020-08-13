<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\SizingCategory;
use Illuminate\Http\Request;

/**
 * @group Quiz
 *
 * APIs for
 */
class QuizController extends Controller
{
    public function sizing_info()
    {
        return response(SizingCategory::query()
            ->where('active',true)
            ->with('sizings','sizing_types.sizings')
            ->get());
    }
}
