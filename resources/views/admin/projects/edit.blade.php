@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @include('partials.previous_button')

        <h2>Change project</h2>

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST" enctype="multipart/form-data">>
            @method('PUT')
            @csrf

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control  @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type">Type</label>
                <select class="form-select" name="type_id" id="type">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                Technologies:
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked( $errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology)) type="checkbox" name="technologies[]"
                            value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="cover_image">Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>

            <div class="mb-2">
                <img id="preview-img" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" rows="3" name="comment">{{ old('comment', $project->comment) }}</textarea>
            </div>

            <button class="btn btn-success" type="submit">Save changes</button>
        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
