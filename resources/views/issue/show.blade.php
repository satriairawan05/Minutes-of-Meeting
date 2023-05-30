@extends('layout.dashboard')

@section('content')

<h3>Issue Detail</h3>

<div class="card">
  <div class="card-header">
    <a href="{{ route('issue.index') }}" class="btn btn-sm btn-info">Back</a>
  </div>
  <div class="card-body">
    @if ($data)
    <form action="/issue/{{ $data->issue_id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="is_private" name="is_private" readonly />
        <label class="form-check-label" for="is_private">
          Private
        </label>
      </div>
      <div class="mb-3">
        <label for="issue_xid">ID Issues</label>
        <input type="text" class="form-control @error('issue_xid') is-invalid @enderror" id="issue_xid" name="issue_xid" value="{{ $data->issue_xid }}" readonly />
        @error('issue_xid')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="project_label" for="project">Project</label>
        <input id="project" name="project" type="text" class="form-control @error('project')
            is_invalid
        @enderror" required value="{{ old('project', $data->project) }}" readonly />
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
        @enderror" required value="{{ old('tracker', $data->tracker) }}" readonly />
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
        @enderror" required value="{{ old('subject', $data->subject) }}" readonly />
        @error('subject')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="description_label" for="description">Description</label>
        <input name="description" id="description" required value="{{ old('description', $data->description) }}" class="form-control @error('description')
        is-invalid
    @enderror" readonly />
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
        @enderror" required value="{{ old('status', $data->status) }}" readonly />
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
        @enderror" required value="{{ old('priority', $data->priority) }}" readonly />
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
        @enderror" required value="{{ old('start_date', $data->start_date) }}" readonly />
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
        @enderror" required value="{{ old('end_date', $data->end_date) }}" readonly />
        @error('end_date')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="c_action_label" for="c_action">Corrective Action</label>
        <input id="c_action" name="c_action" type="text" class="form-control @error('c_action')
            is_invalid
        @enderror" required value="{{ old('c_action', $data->c_action) }}" readonly />
        @error('c_action')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="category_label" for="category">Category</label>
        <input id="category" name="category" type="text" class="form-control @error('category')
            is_invalid
        @enderror" required value="{{ old('category',$data->category) }}" readonly />
        @error('category')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="assignee_label" for="assignee">Assignee</label>
        <input id="assignee" name="assignee" type="text" class="form-control @error('assigned')
            is_invalid
        @enderror" required value="{{ old('assignee',$data->assignee) }}" readonly />
        @error('assignee')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label id="file_label" for="file">File</label>
        <div id="targetLayer"></div>
        <div class="icon-choose-image"></div>
        <img src="{{ asset('storage/'. $data->file) }}" alt="{{ $data->c_action }}" name="oldFile" id="oldFile" class="img-responsive w-25 h-25 opacity-7 img-fluid m-md-2">
        <input id="file" name="file" type="file" class="form-control form-control-file @error('file')
            is_invalid
        @enderror" value="{{ old('file') }}" onchange="return showPreview(this)" readonly />
        @error('file')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-sm btn-success" readonly>Save</button>
    </form>
    @else
    <p>Invalid or missing 'meet' variable.</p>
    @endif
  </div>
</div>

<script>
  const olfFile = document.getElementById('oldFile');
  const newFile = document.getElementById('file');

  newFile.addEventListener('change', function(e) {
    oldFile.style.display = 'none';
  });

  const showPreview = (objFileInput) => {
    if (objFileInput.files[0]) {
      var fileReader = new FileReader();
      fileReader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        $("#targetLayer").html('<img src="' + e.target.result + '" class="img-responsive w-25 h-25 img-fluid m-md-2" />');
        $("#targetLayer").css('opacity', '0.7');
        $(".icon-choose-image").css('opacity', '0.5');
      }
      fileReader.readAsDataURL(objFileInput.files[0]);
    }
  }

</script>

@endsection
