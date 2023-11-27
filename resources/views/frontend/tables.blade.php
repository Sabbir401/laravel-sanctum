@extends('frontend.layouts.main')

@section('main-container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
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
                            <th>Variation Option</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Variation</th>
                            <th>Variation Option</th>
                            <th>Price</th>
                            <th>Stock</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->productItem->SKU }}</td>
                            <td>
                                <a href="{{ route('site_user.restore', ['id' => $user->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-success px-2 py-0 mx-2"> Restore</button>
                                </a>
                                <a href="{{ route('site_user.delete', ['id' => $user->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-danger px-2 py-0 mx-2">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
