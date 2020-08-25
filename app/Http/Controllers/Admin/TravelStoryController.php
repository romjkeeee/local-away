<?php

namespace App\Http\Controllers\Admin;

use App\Boutique;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreTravelStoryRequest;
use App\Http\Requests\AdminUpdateTravelStoryReqeust;
use App\Product;
use App\TravelStory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TravelStoryController extends Controller
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
        $gender = Gender::all()->pluck('title', 'id');
        $products = Product::all()->pluck('name','id');
        return view('admin.pages.travel_stories.create', compact('gender','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreTravelStoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminStoreTravelStoryRequest $request)
    {;
        $travel = TravelStory::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'is_to_homepage' => $request->is_to_homepage,
            'preview_image' => $request->preview_image,
            'full_image_path' => $request->full_image_path,
            'product_ids' => implode(",",$request->product_ids),
        ]);
        if ($request->file('preview_image')) {
            $travel->preview_image = $request->file('preview_image')->store('travel-stories');
            $travel->update();
        }
        if ($request->file('full_image_path')){
            $travel->full_image_path = $request->file('full_image_path')->store('travel-stories');
            $travel->update();
        }
        return redirect()->route('travel-stories.index');
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
        return view('admin.pages.travel_stories.show',compact('data'));
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
        $products = Product::all()->pluck('name','id');
        $products_ids = str_split(str_replace(',','', $travel_story['product_ids']));
        $data_products = Product::query()->whereIn('id',$products_ids)->get();
        $boutiques = Boutique::all()->pluck('name','id');
        return view('admin.pages.travel_stories.edit', compact('data', 'gender','products','data_products', 'boutiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateTravelStoryReqeust $request
     * @param TravelStory $travel_story
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateTravelStoryReqeust $request,TravelStory $travel_story)
    {
        $travel_story->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_to_homepage' => $request->is_to_homepage,
            'product_ids' => implode(",",$request->product_ids),
        ]);
        if ($request->file('preview_image')) {
            $travel_story->preview_image = $request->file('preview_image')->store('travel-stories');
            $travel_story->update();
        }
        if ($request->file('full_image_path')){
            $travel_story->full_image_path = $request->file('full_image_path')->store('travel-stories');
            $travel_story->update();
        }
        return redirect()->route('travel-stories.index');
    }
}
