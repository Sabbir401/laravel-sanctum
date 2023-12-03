@extends('frontend.layouts.main')

@section('main-container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All User Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Variation</th>
                            <th>Price</th>
                            <th>Origin</th>
                            <th>Stock</th>
                            <th>picture</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->productItems->SKU }}</td>
                            <td>{{ $product->category->parentCategory->category_name }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->productItems->productConfigur->variationOption->value }}</td>
                            <td>{{ $product->productItems->price }}</td>
                            <td>{{ $product->country->country_name }}</td>
                            <td>{{ $product->productItems->qty_in_stock }}</td>
                            <td><img src="{{ $product->product_image_1 }}" alt="Image" height="70px" width="70px"></td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Variation</th>
                            <th>Price</th>
                            <th>Origin</th>
                            <th>Stock</th>
                            <th>picture</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>



<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

@endsection
