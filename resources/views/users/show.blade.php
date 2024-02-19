@extends('layouts.main')

@section('title')
    Show user - {{ $user->name }}
@endsection

@section('content')

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>All Users</h3>
                </div>
            </div>
            <div>

                <div class="mb-3">
                    <p>ID: {{ $user->id }}</p>
                </div>

                <div class="mb-3">
                    <p>Name: {{ $user->name }}</p>
                </div>

                <div class="mb-3">
                    <p>E-mail: {{ $user->email }}</p>
                </div>

                <div class="mb-3">
                    <a href="{{ url("users/$user->id/edit") }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                    <form action="{{ url("users/$user->id") }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                    </form>
                </div>

                <div class="mt-5">
                    <h2>Posts</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a href="{{ url("posts/$post->id") }}" class="btn btn-sm btn-primary mr-2">Show</a>
                                    <a href="{{ url("posts/$post->id/edit") }}"
                                        class="btn btn-sm btn-secondary mr-2">Edit</a>
                                    <form action="{{ url("posts/$post->id") }}" method="post" style="display: inline;">
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
    </div>
</div>
@endsection

