<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\variation_option;
use Illuminate\Support\Facades\DB;

class VariationOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variations = DB::table('variations')
            ->select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();

        $variation_option = variation_option::select('variation_options.id', 'variation_options.value', 'variations.name')
            ->join('variations', 'variation_options.variation_id', '=', 'variations.id')
            ->paginate(10);

        $data = compact('variations', 'variation_option');
        return view('product/variationOption')->with($data);
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
            $productVariation = variation_option::create([
                'variation_id' => $request->variation_id,
                'value' => $request->value,
            ]);
            DB::commit();

            return redirect('/product/variationOption')->with('Successfully Created');
        } catch (\Exception $e) {
            DB::rollback();
dd($e);
            return redirect('/product/variationOption')->with('error', 'An error occurred while inserting user information.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(variation_option $variation_option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(variation_option $variation_option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, variation_option $variation_option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(variation_option $variation_option)
    {
        //
    }
}
