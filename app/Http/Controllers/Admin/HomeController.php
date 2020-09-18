<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MediaToColorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return redirect('login');
    }

    public function stripe()
    {
        return view('payments.stripe-checkout');
    }

    public function logout(){
        Auth::logout();
        return \redirect('/');
    }

    public function image($id)
    {
        $data = MediaToColorProduct::query()->where('product_id', $id)->first();
        if ($data) {
            $img = Media::query()->where('id', $data->media_id)->first();
            $remoteImage = $img->getFullUrl();

            return "<img class=\"img-thumbnail\" style=\"display: inline-block; height:100px;\" src=\"".$remoteImage."\" />" ;

        }
    }

}
