<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories = DB::table('product_categories')
            ->select('id', 'category_name')
            ->whereNull('parent_category_id')
            ->get();
        $subCategory = DB::table('product_categories')
            ->select('id', 'category_name')
            ->whereNotNull('parent_category_id')
            ->get();

        $data = compact('Categories', 'subCategory');
        return view('/product/productSetup')->with($data);
    }

    public function getSubCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subCategories = DB::table('product_categories')
            ->select('id', 'category_name')
            ->where('parent_category_id', $categoryId)
            ->get();

        return response()->json($subCategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('reqInfo') == "submit") {
            try {
                DB::beginTransaction();

                // Create a new preduct
                $product = product::create([
                    'category_id' => $request->input('subcategory_id'),
                    'name' => $request->input('name'),
                    'Description' => $request->input('Description'),
                ]);

                // Create a new item
                $productItem = product_item::create([
                    'price' => $request->input('price'),

                ]);

                DB::commit();

                return view('/product/productSetup')->with('Successfull');
            } catch (\Exception $e) {
                DB::rollback();

                // Handle the error as needed
                return redirect('/product')->with('error', 'An error occurred while inserting user information.');
            }
        } else {
            $categoryId = $request->input('category_id');
            $subCategories = DB::table('product_categories')
                ->select('id', 'category_name')
                ->where('parent_category_id', $categoryId)
                ->get();

            return response()->json($subCategories);
        }
    }

    public function asubmit(Request $request){
        // try {
        //     DB::beginTransaction();

            // Create a new preduct
            $product = product::create([
                'category_id' => $request->input('subcategory_id'),
                'name' => $request->input('name'),
                'Description' => $request->input('Description'),
                'product_image' => $request->input('product_image'),
            ]);

            // Create a new item
            // $productItem = product_item::create([
            //     'price' => $request->input('price'),

            // ]);
            // return redirect('product/subcategory');

        //     DB::commit();

        //     return view('productSetup')->with('Successfull');
        // } catch (\Exception $e) {
        //     DB::rollback();

        //     // Handle the error as needed
        //     return redirect('product')->with('error', 'An error occurred while inserting user information.');
        // }
    }
    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
