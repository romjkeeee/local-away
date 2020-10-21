<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MediaToColorProduct;
use App\Order;
use App\Services\Processors\Stripe;
use App\User;
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
        $this->middleware('auth')->except('stripe');
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

    public function stripeCharge(Request $request,Order $order)
    {
        $user = User::query()->where('id',$order->user_id)->first();
        $stripe = new Stripe('stripe');
        $payment = $stripe->getPay($user, $request);
        if ($payment['message'] == 'Success') {
            return redirect()->route('orders.show', $order->id);
        }
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
