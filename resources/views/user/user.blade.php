@extends('frontend.layouts.main')

@section('main-container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Operation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($site_user as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->Phone_number }}</td>
                            <td>
                                <a href="{{ route('site_user.edit', ['id' => $user->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-primary px-2 py-0 mx-2">Edit</button>
                                </a>
                                <a href="{{ route('site_user.details', ['id' => $user->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-success px-2 py-0 mx-2">Details</button>
                                </a>
                                <a href="{{ route('site_user.delete', ['id' => $user->id]) }}" class="text-decoration-none">
                                    <button class="btn btn-danger px-2 py-0 mx-2">Trash</button>
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
