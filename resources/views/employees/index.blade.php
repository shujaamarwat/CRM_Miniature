@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Employees </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Add User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>User Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->firstName }}</td>
                <td>{{ $employee->lastName }}</td>
                <td> {{ $employee->role }} </td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->status }}</td>
                <td>
                    <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $employees->links()}}


@endsection