<?php

namespace App\Http\Controllers\Admin;

use App\Boutique;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreTravelStoryRequest;
use App\Http\Requests\AdminUpdateTravelStoryReqeust;
use App\Product;
use App\TravelStory;
use App\TravelStoryImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TravelStoryController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin|user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = TravelStory::all();
        return view('admin.pages.travel_stories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        return view('admin.pages.travel_stories.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreTravelStoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminStoreTravelStoryRequest $request)
    {
        $travel = TravelStory::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'is_to_homepage' => $request->is_to_homepage,
            'preview_image' => $request->preview_image,
            'full_image_path' => $request->full_image_path,
            'product_ids' => implode(",", $request->product_ids),
        ]);
        if ($request->file('preview_image')) {
            $travel->preview_image = $request->file('preview_image')->store('travel-stories');
            $travel->update();
        }
        if ($request->file('full_image_path')) {
            $travel->full_image_path = $request->file('full_image_path')->store('travel-stories');
            $travel->update();
        }
        return redirect()->to('admin/travel-stories/' . $travel->id . '/step2');
    }

    /**
     * Display the specified resource.
     *
     * @param TravelStory $travel_story
     * @return Application|Factory|View
     */
    public function show(TravelStory $travel_story)
    {
        $data = $travel_story;
        return view('admin.pages.travel_stories.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TravelStory $travel_story
     * @return Application|Factory|View
     */
    public function edit(TravelStory $travel_story)
    {
        $data = $travel_story;
        $gender = Gender::all()->pluck('title', 'id');
        $products = Product::all()->pluck('name', 'id');
        $products_ids = str_split(str_replace(',', '', $travel_story['product_ids']));
        $data_products = Product::query()->whereIn('id', $products_ids)->get();
        $boutiques = Boutique::all()->pluck('name', 'id');
        return view('admin.pages.travel_stories.edit', compact('data', 'gender', 'products', 'data_products', 'boutiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateTravelStoryReqeust $request
     * @param TravelStory $travel_story
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateTravelStoryReqeust $request, TravelStory $travel_story)
    {
        $travel_story->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_to_homepage' => $request->is_to_homepage,
            'product_ids' => implode(",", $request->product_ids),
        ]);
        if ($request->file('preview_image')) {
            $travel_story->preview_image = $request->file('preview_image')->store('travel-stories');
            $travel_story->update();
        }
        if ($request->file('full_image_path')) {
            $travel_story->full_image_path = $request->file('full_image_path')->store('travel-stories');
            $travel_story->update();
        }
        return redirect()->route('travel-stories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Console\Application|\Illuminate\Contracts\Auth\Factory|\Illuminate\Contracts\View\View
     */
    public function step2create($id)
    {
        $data = TravelStory::query()->where('id', $id)->first();
        $genders = Gender::all();
        return view('admin.pages.travel_stories.step-2', compact('data', 'genders'));
    }

    public function store2step(Request $request, $id)
    {
        $story = TravelStory::query()->where('id', $id)->first();
        if ($story) {
            foreach ($request->except('_token', 'submit', '_method') as $key => $item) {
                if ($request->hasFile($key)) {
                    $images = $request->file($key)->store('travel-stories-gender');
                    $data = explode('image_gender_', $key);
                    $travel_image = new TravelStoryImage([
                        'gender_id' => $data[1],
                        'travel_stories_id' => $story->id,
                        'image' => $images
                    ]);
                    $travel_image->save();
                }
            }
            return redirect()->route('travel-stories.index');
        }
    }

    public function deleteImage($id)
    {
        $travel = TravelStoryImage::query()->where('id', $id)->first();
        if (Storage::delete($travel->image)) {
            if ($travel->delete()) {

                return redirect()->back();
            }
            return response('error1');
        }
        return response('error2');

    }
}
