@extends('frontend.layouts.main')

@section('main-container')

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- <link href="{{ url('/css/style.css') }}" rel="stylesheet"> -->

    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input").focus(function() {
                $(this).css("background-color", '##ccf1ff');
            });
            $("input").blur(function() {
                $(this).css("background-color", "#ccf1ff");
            });
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        label {
            font-size: large;
        }

        #category,
        #subcategory,
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            font-size: large;
        }

        .custom-summernote {
            font-size: 24px;
            /* Adjust the font size as needed */
        }
    </style>
</head>

<body>
    <section class="h-100 bg-light">
        <form id="form" action="{{ route('product.submit') }}" method="post">
            @csrf
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="card-body p-md-5 text-black">
                                <h1 class="mb-5 text-uppercase text-primary text-center">Product Setup</h1>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example9">Name</label>
                                    <input type="text" name="name" id="form3Example9" class="form-control form-control-sm" />
                                    <span class="text-danger">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example9">SKU Name</label>
                                    <input type="text" name="sku_name" id="form3Example9" class="form-control form-control-sm" />
                                    <span class="text-danger">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example9">Description</label>
                                    <!-- <textarea id="summernote" name="editordata"></textarea> -->
                                    <textarea name="Description" id="myeditorinstance" placeholder="Write Here..."></textarea>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1n1">Category Name</label><br>
                                            <select name="category_id" id="category" class="p-1">
                                                <option selected disabled>--Select--</option>
                                                @foreach($Categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#category').on('change', function() {
                                                    // Get the selected category_id
                                                    var selectedCategoryId = $(this).val();

                                                    // Check if a category is selected
                                                    if (selectedCategoryId) {
                                                        // Send the category_id to the controller using AJAX
                                                        $.ajax({
                                                            url: '/product', // Replace with the actual route
                                                            method: 'POST',
                                                            data: {
                                                                category_id: selectedCategoryId,
                                                            },
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            success: function(response) {
                                                                $('#subcategory').empty();
                                                                $('#variation').empty();

                                                                // Append new options based on the response.subCategory
                                                                $.each(response.subCategory, function(index, subCategory) {
                                                                    $('#subcategory').append('<option value="' + subCategory.id + '">' + subCategory.category_name + '</option>');
                                                                });
                                                                $.each(response.variation, function(index, variation) {
                                                                    $('#variation').append('<option value="' + variation.id + '">' + variation.name + '</option>');
                                                                });
                                                            },
                                                            error: function(error) {
                                                                // Handle errors if any
                                                                console.error('Error:', error);
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1n1">Sub Category Name</label><br>
                                            <select name="subcategory_id" id="subcategory" class="p-1">
                                                <option selected disabled>--Select--</option>
                                                @foreach($subCategory as $sub)
                                                <option value="{{ $sub->id }}">{{ $sub->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1n1">Varitation Name</label><br>
                                            <select name="variation_id" id="variation" class="p-1">
                                                <option selected disabled>--Select--</option>
                                                @foreach($variation as $var)
                                                <option value="{{ $var->id }}">{{ $var->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#variation').on('change', function() {
                                                    // Get the selected category_id
                                                    var selectedVariationId = $(this).val();

                                                    // Check if a category is selected
                                                    if (selectedVariationId) {
                                                        // Send the category_id to the controller using AJAX
                                                        $.ajax({
                                                            url: '/product/var', // Replace with the actual route
                                                            method: 'POST',
                                                            data: {
                                                                variation_id: selectedVariationId,
                                                            },
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            success: function(response) {
                                                                $('#variationOption').empty();

                                                                $.each(response, function(index, variationOption) {
                                                                    $('#variationOption').append('<option value="' + variationOption.id + '">' + variationOption.value + '</option>');
                                                                });
                                                            },
                                                            error: function(error) {
                                                                // Handle errors if any
                                                                console.error('Error:', error);
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1n1">Variation Option Name</label><br>
                                            <select name="variationOption" id="variationOption" class="p-1">
                                                <option selected disabled>--Select--</option>
                                                @foreach($variationOption as $var)
                                                <option value="{{ $var->id }}">{{ $var->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example9">Price</label>
                                    <input type="number" name="price" id="form3Example9" class="form-control form-control-sm" />
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example9">Stock Quantity</label>
                                    <input type="number" name="qtn" id="form3Example9" class="form-control form-control-sm" />
                                </div>

                                <label class="form-label" for="form3Example8">Image</label>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline mb-2">
                                            <input type="file" name="image_1" id="form3Example8" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline mb-2">
                                            <input type="file" name="image_2" id="form3Example8" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline mb-2">
                                            <input type="file" name="image_3" id="form3Example8" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="form-outline mb-2">
                                            <input type="file" name="image_4" id="form3Example8" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end pt-3">
                                    <button type="reset" class="btn btn-danger btn-lg m-3">Reset all</button>
                                    <button type="submit" id="submit" class="btn btn-warning btn-lg m-3">Submit</button>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $("#form").submit(function(e) {
                                            //prevent Default functionality
                                            e.preventDefault();

                                            //get the action-url of the form
                                            var actionurl = e.currentTarget.action;
                                            console.log('avb');

                                            //do your own request an handle the results
                                            // $.ajax({
                                            //     url: actionurl,
                                            //     type: 'post',
                                            //     dataType: 'application/json',
                                            //     data: $("#form").serialize(),
                                            //     success: function(response) {
                                            //         alert(response.message);
                                            //     },
                                            //     error: function(error) {
                                            //         alert('error.responseJSON.message');
                                            //     }
                                            // });


                                            $.ajax({
                                                url: actionurl, // Replace with the actual route
                                                method: 'POST',
                                                data: $("#form").serialize(),
                                                success: function(response) {
                                                    alert(response.message);
                                                    $("#form")[0].reset();
                                                },
                                                error: function(error) {
                                                    alert(error.responseJSON.message);
                                                }
                                            });

                                        });

                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </form>
    </section>

    <!-- <script type="text/javascript">
    $(document).ready(function() {
    $('#summernote').summernote({
          height: 250,
          disableResizeEditor: true, // This is optional if you want to remove resize
          className: 'custom-summernote'
     });
  });
</script> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>

</html>

@endsection
