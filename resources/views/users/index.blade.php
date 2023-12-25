@extends('app')
@section('main')
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}
    </div>
@endif
</div>
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
