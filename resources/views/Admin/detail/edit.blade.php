@extends('admin.layout.dashboard')

@section('content')
<form action="/issue/{{ $detail->id }}" method="post">
  @method('put')
  @csrf
  <div class="mb-3">
    <input type="radio" name="is_private" id="is_private" onclick="change()" value="{{ old('is_private',$detail->is_private) }}">
    <label for="is_private">Private</label>
  </div>
  <div class="mb-3">
    <label id="project_label" for="project">Project</label>
    <input id="project" name="project" type="text" class="form-control @error('project')
            is_invalid
        @enderror" required value="{{ old('project',$detail->project) }}" />
    @error('project')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="tracker_label" for="tracker">Tracker</label>
    <input id="tracker" name="tracker" type="text" class="form-control @error('tracker')
            is_invalid
        @enderror" required value="{{ old('tracker',$detail->tracker) }}" />
    @error('tracker')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="subject_label" for="subject">Subject</label>
    <input id="subject" name="subject" type="text" class="form-control @error('subject')
            is_invalid
        @enderror" required value="{{ old('subject',$detail->subject) }}" />
    @error('subject')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="description_label" for="description">Description</label>
    <input name="description" id="description" cols="30" rows="10" required value="{{ old('description',$detail->description) }}" class="form-control @error('description')
        is-invalid
    @enderror" />
    @error('description')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="status_label" for="status">Status</label>
    <input id="status" name="status" type="text" class="form-control @error('status')
            is_invalid
        @enderror" required value="{{ old('status',$detail->status) }}" />
    @error('status')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="priority_label" for="priority">Priority</label>
    <input id="priority" name="priority" type="text" class="form-control @error('priority')
            is_invalid
        @enderror" required value="{{ old('priority',$detail->priority) }}" />
    @error('priority')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="start_date_label" for="start_date">Start Date</label>
    <input id="start_date" name="start_date" type="date" class="form-control @error('start_date')
            is_invalid
        @enderror" required value="{{ old('start_date',$detail->start_date) }}" />
    @error('start_date')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label id="end_date_label" for="end_date">End Date</label>
    <input id="end_date" name="end_date" type="date" class="form-control @error('end_date')
            is_invalid
        @enderror" required value="{{ old('end_date',$detail->end_date) }}" />
    @error('end_date')
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
