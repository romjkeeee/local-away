<?php

namespace App\Http\Controllers\Admin\v2;

use App\Destination;
use App\DestinationStory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\v2\DestinationStoryStoreRequest;
use App\Http\Requests\Admin\v2\DestinationStoryUpdateRequest;
use Illuminate\Support\Str;

class DestinationStoryController extends Controller
{
    function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = DestinationStory::all();
        return view('admin.pages.destination_story.index', compact('data'));
    }

    public function create()
    {
        $destinations = Destination::query()->pluck('name','id');
        return view('admin.pages.destination_story.create',compact('destinations'));
    }

    public function store(DestinationStoryStoreRequest $request)
    {
        $destinationStory = DestinationStory::query()->create(array_merge($request->all(), ['url' => Str::slug($request->name)]));
        if ($request->file('image')) {
            $destinationStory->image = $request->file('image')->store('destination_story');
            $destinationStory->update();
        }
        return redirect()->route('destination-stories.index');
    }

    public function show(DestinationStory $destinationStory)
    {
        $data = $destinationStory;
        return view('admin.pages.destination_story.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DestinationStory $destination
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(DestinationStory $destinationStory)
    {
        $data = $destinationStory;
        $destinations = Destination::query()->pluck('name','id');
        return view('admin.pages.destination_story.edit', compact('data','destinations'));
    }

    public function update(DestinationStoryUpdateRequest $request, DestinationStory $destinationStory)
    {
        if ($destinationStory->update(array_merge($request->all(), ['url' => Str::slug($request->name)]))) {
            if ($request->file('image')) {
                $destinationStory->image = $request->file('image')->store('destination_story');
                $destinationStory->update();
            }
            return redirect()->route('destination-stories.index');
        }
    }
}
