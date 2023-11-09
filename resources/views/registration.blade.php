<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ url('public/css.style.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <section class="h-100 bg-light">
    <form action="{{url('/')}}/register" method="post">
        @csrf
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                    </div>
                    <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                        <h3 class="mb-5 text-uppercase">Customer registration form</h3>

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
                            <label class="form-label" for="form3Example9">Email</label>
                            <input type="email" name="email" id="form3Example9" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example9">Password</label>
                            <input type="password" name="password" id="form3Example9" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example9">Confirm Password</label>
                            <input type="password" name="confirm_password" id="form3Example9" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('confirm_password')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example8">Phone Number</label>
                            <input type="number" name="phone" id="form3Example8" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('phone')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1m1">Unit/App. Number</label>
                                    <input type="text" name="unit_number" id="form3Example1m1" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('unit_number')
                                    {{$message}}
                                @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                    <label class="form-label"  for="form3Example1n1">Street Address</label>
                                    <input type="text" name="street_address" id="form3Example1n1" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('street_address')
                                    {{$message}}
                                @enderror
                            </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example8">Address Line-1</label>
                            <input type="text" name="address_1" id="form3Example8" class="form-control form-control-sm" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example8">Address Line-2</label>
                            <input type="text" name="address_2" id="form3Example8" class="form-control form-control-sm" />
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1m1">City</label>
                                    <input type="text" name="city" id="form3Example1m1" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('city')
                                    {{$message}}
                                @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1n1">Region</label>
                                    <input type="text" name="region" id="form3Example1n1" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('region')
                                    {{$message}}
                                @enderror
                            </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1n1">Postal_code</label>
                                    <input type="text" name="postal_code" id="form3Example1n1" class="form-control form-control-sm" />
                            <span class="text-danger">
                                @error('postal_code')
                                    {{$message}}
                                @enderror
                            </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                            <label class="form-label" for="form3Example1n1">Country</label><br>
                                <select name="country" id="country">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                            <button type="reset" class="btn btn-danger btn-lg m-3">Reset all</button>
                            <button type="submit" class="btn btn-warning btn-lg m-3">Submit</button>
                        </div>

                    </div>
                    </div>
                </div>
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
