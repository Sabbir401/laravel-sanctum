<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5">
        <div id="products">
            <div class="row mx-0">
                <div class="col-lg-3 col-md-6 ancor">
                    <div class="border rounded py-4 px-2">
                        <h2>Categories</h2>
                    </div>
                    @foreach ($Categories as $cat)
                    <a href="">
                        <div class="border rounded p-2 bt">
                            {{ $cat->category_name }}
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="row mx-0x">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-3 ancor">
                            <a href="{{ route('product.details', ['id' => $product->id]) }}">
                                <div class="product-card d-flex flex-column align-items-center rounded">
                                    <div class="product-card-img"> <img src="{{ $product->product_image_1 }}" height="100%" width="100%"> </div>
                                    <div class="product-card-body pt-5">
                                        <div class="product-name">{{ $product->productItems->SKU }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
