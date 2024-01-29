@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('partials.previous_button')

        <h2>{{ $project->title }}</h2>

        @if ($project->cover_image)
            <div>
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            </div>
        @else
            <p>No image</p>
        @endif

        <div class="mt-4">
            Type: {{ $project->type ? $project->type->name : 'No type' }}
        </div>

        <div class="mt-4">
            {{ $project->created_at }}
        </div>

        <div class="mt-4">
            Slug: {{ $project->slug }}
        </div>

        <h5 class="mt-4">
            {{ $project->content }}
        </h5>

        <p class=mt-4>
            {{ $project->comment }}
        </p>

        <div>
            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Modifica</a>
        </div>
        
        @include('admin.projects.partials.delete_button')
    @endsection
