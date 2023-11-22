<!doctype html>
<html lang="en">

<head>
    <title>Variation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 bg-light">
        <form action="{{ route('variation.store') }}" method="post">
            @csrf
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="card-body p-md-5 text-black">
                                    <h2 class="mb-5 text-uppercase text-primary text-center">Product Variation</h2>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="form3Example1n1">Category Name</label><br>
                                            <select name="category_id" id="category" class="p-1">
                                                <option selected disabled>--Select--</option>
                                                @foreach($Categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label" for="form3Example1n1">Variation Name</label><br>
                                            <input type="text" name="name" id="form3Example9" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start pt-3">
                                        <button type="submit" class="btn btn-warning btn-md">Save</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Variation Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $startIndex = ($variations->currentPage() - 1) * $variations->perPage() + 1;
                                    @endphp
                                    @foreach ($variations as $variation)
                                    <tr>
                                        <td>{{ $startIndex++ }}</td>
                                        <td>{{ $variation->category_name }}</td>
                                        <td>{{ $variation->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $variations->links() }}


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
