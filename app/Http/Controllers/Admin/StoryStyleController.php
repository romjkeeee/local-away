<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreStyleStoryRequest;
use App\Http\Requests\AdminUpdateStoryStyleRequest;
use App\StoryStyle;
use App\TravelStory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StoryStyleController extends Controller
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
        $data = StoryStyle::all();
        return view('admin.pages.story_style.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $travel_stories = TravelStory::all()->pluck('name', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.story_style.create', compact('travel_stories', 'gender'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreStyleStoryRequest $request
     * @return RedirectResponse
     */
    public function store(AdminStoreStyleStoryRequest $request)
    {
        $story = StoryStyle::query()->create($request->validated());
        if ($request->file('image')) {
            $story->image = $request->file('image')->store('travel_purpose');
            $story->update();
        }
        return redirect()->route('story-styles.index');
    }


    /**
     * Display the specified resource.
     *
     * @param StoryStyle $story_style
     * @return Application|Factory|View
     */
    public function show(StoryStyle $story_style)
    {
        $data = $story_style;
        return view('admin.pages.story_style.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StoryStyle $story_style
     * @return Application|Factory|View
     */
    public function edit(StoryStyle $story_style)
    {
        $data = $story_style;
        $travel_stories = TravelStory::all()->pluck('name', 'id');
        $gender = Gender::all()->pluck('title', 'id');
        return view('admin.pages.story_style.edit', compact('data','travel_stories','gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateStoryStyleRequest $request
     * @param StoryStyle $story_style
     * @return RedirectResponse
     */
    public function update(AdminUpdateStoryStyleRequest $request,StoryStyle $story_style)
    {
        if ($story_style->update($request->validated()))
        {
            if ($request->file('image')) {
                $story_style->image = $request->file('image')->store('story-styles');
                $story_style->update();
            }
            return redirect()->route('story-styles.index');
        }
    }
}
