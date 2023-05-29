@extends('admin.layout.dashboard')

@section('content')

<h3>Issue Detail</h3>

<div class="card">
  <div class="card-header">
    <a href="{{ route('issue.index') }}" class="btn btn-sm btn-info">Back</a>
  </div>
  <div class="card-body">
    @if ($meet)
    <form action="{{ route('issue.edit', $meet->id) }}" method="post">
      @method('put')
      @csrf
      <div class="mb-3">
        <input type="radio" name="is_private" id="is_private" onclick="change()" value="{{ old('is_private', $meet->is_private) }}">
        <label for="is_private">Private</label>
      </div>
      <div class="mb-3">
        <label id="project_label" for="project">Project</label>
        <input id="project" name="project" type="text" class="form-control @error('project')
            is_invalid
        @enderror" required value="{{ old('project', $meet->project) }}" />
        @error('project')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="file_label" for="file">File</label>
        <input id="file" name="file" type="file" class="form-control form-control-file text-dark @error('file')
            is_invalid
        @enderror" value="{{ old('file') }}" />
        @error('file')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-sm btn-success">Save</button>
    </form>
    @else
    <p>Invalid or missing 'meet' variable.</p>
    @endif
  </div>
</div>

<script>
  const btnPrivate = document.getElementById('is_private');
  const change = () => {
    if (btnPrivate) {
      btnPrivate.value = true;
    } else {
      btnPrivate.value = false;
    }
  }
</script>

@endsection
