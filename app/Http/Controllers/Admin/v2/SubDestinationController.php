<?php

namespace App\Http\Controllers\Admin\v2;

use App\DestinationStory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\v2\SubDestinationStoreRequest;
use App\Http\Requests\Admin\v2\SubDestinationUpdateRequest;
use App\SubDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubDestinationController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = SubDestination::all();
        return view('admin.pages.sub_destination.index', compact('data'));
    }

    public function create()
    {
        $destinations = DestinationStory::query()->pluck('name','id');
        return view('admin.pages.sub_destination.create',compact('destinations'));
    }

    public function store(SubDestinationStoreRequest $request)
    {
        $destinationStory = SubDestination::query()->create(array_merge($request->all(), ['url' => Str::slug($request->name)]));
        if ($request->file('image')) {
            $destinationStory->image = $request->file('image')->store('sub_destination');
            $destinationStory->update();
        }
        return redirect()->route('sub-destinations.index');
    }

    public function show(SubDestination $subDestination)
    {
        $data = $subDestination;
        return view('admin.pages.sub_destination.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DestinationStory $destination
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(SubDestination $subDestination)
    {
        $data = $subDestination;
        $destinations = DestinationStory::query()->pluck('name','id');
        return view('admin.pages.sub_destination.edit', compact('data','destinations'));
    }

    public function update(SubDestinationUpdateRequest $request, SubDestination $subDestination)
    {
        if ($subDestination->update(array_merge($request->all(), ['url' => Str::slug($request->name)]))) {
            if ($request->file('image')) {
                $subDestination->image = $request->file('image')->store('sub_destination');
                $subDestination->update();
            }
            return redirect()->route('sub-destinations.index');
        }
    }
}
