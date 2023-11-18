<?php

namespace App\Http\Controllers;

use App\Models\product_category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category');
    }

    /**

     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $productCategory = product_category::create([
            'category_name' => $request->input('name'),
        ]);
        return redirect('product/category');
    }

    public function display()
    {
        $Categories = product_category::all();
        // $product_category = product_category::whereNotNull('parent_category_id')->paginate(10);
        // $data = compact('product_category', 'category');
        // return view('subCategory')->with($data);

        $productCategories = product_category::select(
            'product_categories.id as id',
            'parent.category_name as category',
            'product_categories.category_name as subcategory'
        )
            ->leftJoin('product_categories as parent', 'product_categories.parent_category_id', '=', 'parent.id')
            ->whereNotNull('product_categories.parent_category_id')
            ->orderBy('parent.category_name', 'asc')
            ->paginate(10);

        $data = compact('productCategories','Categories');
        return view('subCategory')->with($data);
    }

    public function create(Request $request)
    {
        $productSubCategory = product_category::create([
            'category_name' => $request->input('name'),
            'parent_category_id' => $request->input('category_id')
        ]);
        return redirect('product/subcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(product_category $product_category)
    {
        $product_category = product_category::whereNull('parent_category_id')->paginate(10);
        $data = compact('product_category');
        return view('category')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_category $product_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product_category $product_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_category $product_category)
    {
        //
    }
}
