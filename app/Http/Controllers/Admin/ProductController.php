<?php

namespace App\Http\Controllers\Admin;

use App\Boutique;
use App\Color;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStorePersonalStyle;
use App\Http\Requests\AdminStoreProductRequest;
use App\Http\Requests\AdminUpdateProductRequest;
use App\MediaToColorProduct;
use App\Product;
use App\ProductCategory;
use App\Sizing;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = Product::query()->with('sizes','colors','gender')->get();
        return view('admin.pages.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $gender = Gender::all()->pluck('title', 'id');
        $sizes = Sizing::all();
        $colors = Color::all();
        $category = ProductCategory::all()->pluck('name','id');
        $boutiques = Boutique::all()->pluck('name','id');
        return view('admin.pages.products.create', compact('gender','sizes','colors','category','boutiques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreProductRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(AdminStoreProductRequest $request)
    {
        $product = new Product($request->validated());
        $product->save();

        if($request->hasFile('images') && $request->file('images'))
        {
            foreach ($request->file('images') as $images) {
                $product->addMedia($images)->toMediaCollection('images');
            }
        }
        $product->sizes()->attach($request->get('sizing_id'));
        $product->colors()->attach($request->get('color_id'));
        return redirect()->to('admin/product/'.$product->id.'/step2');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        $data = $product;
        return view('admin.pages.products.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $gender = Gender::all()->pluck('title', 'id');
        $sizes = Sizing::all();
        $colors = Color::all();
        $data = $product;
        $category = ProductCategory::all()->pluck('name','id');
        $boutiques = Boutique::all()->pluck('name','id');
        return view('admin.pages.products.edit', compact('data','gender','sizes','colors','category', 'boutiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(AdminUpdateProductRequest $request, Product $product)
    {
        if ($product->update($request->validated()))
        {
            if($request->hasFile('images') && $request->file('images'))
            {
                foreach ($request->file('images') as $images) {
                    $product->addMedia($images)->toMediaCollection('images');
                }
            }
            $product->sizes()->sync($request->get('sizing_id'));
            $product->colors()->sync($request->get('color_id'));
            return redirect()->route('products.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function step2create($id)
    {
        $product = Product::query()->where('id',$id)->first();
        return view('admin.pages.products.step-2', compact('product'));
    }

    public function store2step(Request $request, $id)
    {
        $product = Product::query()->where('id',$id)->first();
        if ($product)
        {
            foreach ($request->except('_token','submit') as $key => $item) {
                if($request->hasFile($key) && $request->file($key))
                {
                    foreach ($request->file($key) as $images) {
                        $images = $product->addMedia($images)->toMediaCollection('images');
                        $data = explode('_',$key);
                        $color = new MediaToColorProduct([
                            'color_id' => $data[1],
                            'product_id' => $product->id,
                            'media_id' => $images->id
                        ]);
                        $color->save();
                    }
                }
            }
            return redirect()->route('products.index');
        }
    }

    public function show_image(Product $product)
    {
        $data = $product;
        return view('admin.pages.products.images', compact('data'));
    }

    public function deleteImage($id)
    {
        if (Media::query()->where('id', $id)->delete())
        {
                return redirect()->back();
        }
        return response('error1');

    }
}
