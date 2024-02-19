@extends('layouts.main')

@section('title')
    add posts
@endsection


@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h1>Add Posts</h1>
                </div>
            </div>
            <form action="{{ url('/posts') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="enabled" class="form-label">Enabled</label>
                    <input type="checkbox" id="enabled" name="enabled" checked>
                </div>

                {{-- <div class="form-group">
                    <label for="user_id">Writer:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <button type="submit" class="btn btn-primary" name="submit" value="add">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

