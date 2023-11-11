<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* .row{
                height: 20px;
                width: 20px;
            } */
    </style>
</head>

<body>
    <div class="container">
        <div class="row m-2">
            <form action="" class="col-9">
                <div class="form-group">
                    <input type="search" name="search" id="" class="form-control" placeholder="Search here"
                        aria-describedby="helpId" value="{{ $search }}">
                </div>
                <button class="btn btn-primary">Search</button>
                <a href="{{ url('/customer/view') }}">
                    <button class="btn btn-danger" type="button">Reset</button>
                </a>
            </form>
            <div class="col-3">
                <a href="{{ route('customer.create') }}">
                    <button class="btn btn-primary">Add</button>
                </a>
                <a href="{{ url('customer/trash') }}">
                    <button class="btn btn-danger">Go To Trash</button>
                </a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->gender == 'M')
                                Male
                            @elseif ($customer->gender == 'F')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                        <td>{{ $customer->dob }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->states }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>
                            @if ($customer->status == '1')
                                <a href="">
                                    <span class="badge badge-success">Active</span>
                                </a>
                            @else
                                <a href="">
                                    <span class="badge badge-danger">Inactive</span>
                                </a>
                            @endif
                        </td>
                        <td>
                            {{-- <a href="{{url('/customer/delete/')}}/{{$customer->customer_id}}"> --}}
                            <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-danger">Trash</button>
                            </a>
                            <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}">
                                <button class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="row">
            {{ $customers->links() }}
        </div>
    </div>

</body>

</html>
