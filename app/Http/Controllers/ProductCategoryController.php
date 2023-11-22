<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_category;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Categories = DB::table('product_categories')
        //     ->select('id', 'category_name')
        //     ->whereNull('parent_category_id')
        //     ->get();
        // $subCategory = DB::table('product_categories')
        //     ->select('id', 'category_name')
        //     ->whereNotNull('parent_category_id')
        //     ->get();

        // $data = compact('Categories', 'subCategory');
        // return view('productSetup')->with($data);
    }

    public function getSubCategory(Request $request)
    {
        // $categoryId = $request->input('category_id');
        // $subCategories = DB::table('product_categories')
        //     ->select('id', 'category_name')
        //     ->where('parent_category_id', $categoryId)
        //     ->get();

        // return response()->json($subCategories);

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
        return redirect('/product/category');
    }

    public function display()
    {
        // $Categories = product_category::all();
        $Categories = DB::table('product_categories')
        ->select('id', 'category_name')
        ->whereNull('parent_category_id')
        ->get();

        $productCategories = product_category::select(
            'product_categories.id as id',
            'parent.category_name as category',
            'product_categories.category_name as subcategory'
        )
            ->leftJoin('product_categories as parent', 'product_categories.parent_category_id', '=', 'parent.id')
            ->whereNotNull('product_categories.parent_category_id')
            ->orderBy('parent.category_name', 'asc')
            ->paginate(10);

        $data = compact('productCategories', 'Categories');
        return view('/product/subCategory')->with($data);
    }

    public function create(Request $request)
    {
        $productSubCategory = product_category::create([
            'category_name' => $request->input('name'),
            'parent_category_id' => $request->input('category_id')
        ]);
        return redirect('/product/subcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(product_category $product_category)
    {
        $product_category = product_category::whereNull('parent_category_id')->paginate(10);
        $data = compact('product_category');
        return view('/product/category')->with($data);
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
