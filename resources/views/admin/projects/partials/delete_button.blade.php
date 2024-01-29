<form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="d-inline-block" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>