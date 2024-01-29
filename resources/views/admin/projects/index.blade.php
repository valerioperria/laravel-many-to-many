@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Projects' list</h2>

        <div class="text-end">
          <a class="btn btn-success" href="{{ route('admin.projects.create') }}">New project</a>
        </div>
        @if (session('message'))
            <div class="alert alert-info mt-3">
                {{ session('message') }}
            </div>
        @endif

        @if (count($projects) > 0)
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Data</th>
                    <th scope="col">Content</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>{{ $project->content }}</td>
                        <td>{{ $project->comment }}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Details</a>
                          <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Change</a>
                          @include('admin.projects.partials.delete_button')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
        @else
            <div class="alert alert-info mt-5">
                Projects' list is empty
            </div>
        @endif

    </div>
@endsection
