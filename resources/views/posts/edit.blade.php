@extends('layouts.main')

@section('title')
Edit posts
@endsection

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
    <h1>Edit posts</h1>
</div>
</div>
    <form action="{{ url("/posts/$post->id") }}" method="post">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">slug</label>
            <input type="text" name="slug" value="{{ $post->slug }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">body</label>
            <textarea name="body" >{{ $post->body }}</textarea>
        </div>

        <div class="mb-3">
            <label for="enabled" class="form-label">Enabled</label>
            <input type="checkbox" id="enabled" name="enabled" {{ $post->enabled ? 'checked' : '' }}>
        </div>


         <button type="submit" class="btn btn-primary" name="submit" value="update">Submit</button>
    </form>
    
@endsection