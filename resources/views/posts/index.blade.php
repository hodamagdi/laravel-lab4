@extends('layouts.main')

@section('title')
    all posts
@endsection

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h1>All posts</h1>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">slug</th>
                            <th scope="col">body</th>
                            <th scope="col">enabled</th>
                            <th scope="col">writer</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->enabled }}</td>
                                <td>{{ $post->user->name }}</td>
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
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
