<?php

namespace App\Http\Controllers;

use App\Models\variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariationController extends Controller
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

        $variations = Variation::select('variations.id', 'variations.name', 'product_categories.category_name')
            ->join('product_categories', 'variations.category_id', '=', 'product_categories.id', 'inner')
            ->paginate(10);

        $data = compact('Categories','variations');
        return view('/product/variation')->with($data);
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
            $productVariation = variation::create([
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
            ]);
            DB::commit();

            return redirect('/product/variation')->with('Successfully Deleted');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/product/variation')->with('error', 'An error occurred while inserting user information.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(variation $variation)
    {
        //
    }
}
