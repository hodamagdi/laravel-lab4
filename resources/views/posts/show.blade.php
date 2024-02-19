@extends('layouts.main')

@section('title')
    show posts
@endsection


@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h1>show posts-{{ $post->title }}</h1>
                    </div>
                </div>

                <div>
                    <div class="mb-3">
                        <p>slug:{{ $post->slug }}</p>
                    </div>

                    <div class="mb-3">
                        <p>body:{{ $post->body }}</p>
                    </div>

                    <div class="mb-3">
                        <p>enabled:{{ $post->enabled }}</p>
                    </div>

                    <div class="mb-3">
                        <p>writer: {{ $post->user->name}}</p>
                    </div>


                    <div class="mb-3">
                    <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-sm btn-secondary mr-2">Edit</a>

                    <form action="{{ url("posts/$post->id") }}" method="POST"  style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
