@extends('layouts.main')

@section('title')
All Users
@endsection

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h1>All Users</h1>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">posts</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ $user->posts_count }} posts</td>
                            <td>
                                <a href="{{url("users/$user->id")}}" class="btn btn-sm btn-primary mr-2">Show</a>
                                <a href="{{url("users/$user->id/edit")}}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                                <form action="{{url("users/$user->id")}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection