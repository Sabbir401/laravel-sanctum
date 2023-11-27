<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product_configaration;

use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Storage;

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
            ->orderBy('category_name', 'asc')
            ->get();

        $subCategory = DB::table('product_categories')
            ->select('id', 'category_name')
            ->whereNotNull('parent_category_id')
            ->get();

        $variation = DB::table('variations')
            ->select('id', 'name')
            ->get();

        $variationOption = DB::table('variation_options')
            ->select('id', 'value')
            ->get();

        $data = compact('Categories', 'subCategory', 'variation', 'variationOption');
        return view('/product/productSetup')->with($data);
    }

    public function getSubCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subCategories = DB::table('product_categories')
            ->select('id', 'category_name')
            ->where('parent_category_id', $categoryId)
            ->get();

        $variation = DB::table('variations')
            ->select('id', 'name')
            ->where('category_id', $categoryId)
            ->get();

        $data = [
            'subCategory' => $subCategories,
            'variation' => $variation,
        ];
        return response()->json($data);
    }

    public function getvariation(Request $request)
    {
        $variationId = $request->input('variation_id');
        $variationOption = DB::table('variation_options')
            ->select('id', 'value')
            ->where('variation_id', $variationId)
            ->get();

        return response()->json($variationOption);
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
        // dd($request);
        try {
            DB::beginTransaction();
            // Create a new preduct

            // $fileName = time().'.'.$request->file('image_1').'pdf';
            // Storage::disk('local')->put('/'.$fileName, $request->file('image_1'));

            $product = product::create([
                'category_id' => $request->input('subcategory_id'),
                'name' => $request->input('name'),
                'Description' => $request->input('Description'),
            ]);

            $productItem = product_item::create([
                'product_id' => $product->id,
                'SKU' => $request->input('sku_name'),
                'qty_in_stock' => $request->input('qtn'),
                'price' => $request->input('price'),
            ]);
            $productconfigaration = product_configaration::create([
                'product_item_id' => $productItem->id,
                'variation_option_id' => $request->input('variationOption')
            ]);

            DB::commit();

            return response()->json(['message' => 'Product Successfully Inserted']);
        } catch (\Exception $e) {
            DB::rollback();

            // Handle the error as needed
            return response()->json(['message' => 'Something Went Wrong']);
        }
    }

    public function asubmit(Request $request)
    {
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
    public function show()
    {
        $product = product::with('category', 'category.variations')->get()->toArray();

        dd($product);
        if ($product) {
            return view('/frontend/tables', compact('category'));
        } else {
            return "Data Not Found";
        }
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
