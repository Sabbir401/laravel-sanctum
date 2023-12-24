<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\product;
use App\Models\product_category;
use App\Models\product_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product_configaration;
use Illuminate\Support\Facades\Storage;

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

        $countries = country::all();

        $data = compact('Categories', 'subCategory', 'variation', 'variationOption', 'countries');
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
        try {
            DB::beginTransaction();

            $uploadedImagePaths = [];

            for ($i = 1; $i <= 4; $i++) {
                $imageKey = 'image_' . $i;
                $file = $request->file($imageKey);

                if ($file !== null) {
                    $fileName = time() . '_' . $imageKey . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/image/', $fileName, 'local');
                    $uploadedImagePaths[$imageKey] = 'storage/image/' . $fileName;
                }
            }

            $product = product::create([
                'category_id' => $request->input('subcategory_id'),
                'name' => $request->input('name'),
                'Description' => $request->input('Description'),
                'product_code' => $request->input('product_code'),
                'origin' => $request->input('country'),
                'product_image_1' => $uploadedImagePaths['image_1'] ?? null,
                'product_image_2' => $uploadedImagePaths['image_2'] ?? null,
                'product_image_3' => $uploadedImagePaths['image_3'] ?? null,
                'product_image_4' => $uploadedImagePaths['image_4'] ?? null,
            ]);

            $productItem = product_item::create([
                'product_id' => $product->id,
                'SKU' => $request->input('sku_name'),
                'qty_in_stock' => $request->input('qtn'),
                'price' => $request->input('price'),
            ]);

            $productconfigaration = product_configaration::create([
                'product_item_id' => $productItem->id,
                'variation_option_id' => $request->input('variationOption'),
            ]);

            DB::commit();

            return redirect('/product');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Something Went Wrong']);
        }
    }

    public function display()
    {
        $products = product::with('productItems',)->get();
        $Categories = DB::table('product_categories')
            ->select('id', 'category_name')
            ->whereNull('parent_category_id')
            ->orderBy('category_name', 'asc')
            ->get();

        if ($products) {
            return view('/product/products', compact('products','Categories'));
        } else {
            return "Data Not Found";
        }
    }


    public function details($id)
    {
        $product = product::with('category', 'category.parentCategory', 'country', 'productItems', 'productItems.productConfigur.variationOption', 'productItems.productConfigur.variationOption.variation')->find($id);

        if ($product) {
            return view('product/productDetails', compact('product'));
        } else {
            return "Data Not Found";
        }
    }

    public function single($id)
    {
        $product = product::with('category', 'category.parentCategory', 'country', 'productItems', 'productItems.productConfigur.variationOption', 'productItems.productConfigur.variationOption.variation')->find($id);

        if ($product) {
            return view('product/productDetails', compact('product'));
        } else {
            return "Data Not Found";
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


    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = product::with('category', 'category.parentCategory', 'country', 'productItems', 'productItems.productConfigur.variationOption', 'productItems.productConfigur.variationOption.variation')->get();
        $Categories = DB::table('product_categories')
            ->select('id', 'category_name')
            ->whereNull('parent_category_id')
            ->orderBy('category_name', 'asc')
            ->get();

        if ($products) {
            return view('/product/productInfo', compact('products','Categories'));
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
