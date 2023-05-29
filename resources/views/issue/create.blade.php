@extends('admin.layout.dashboard')

@section('content')
<h3 class="mb-2">Add Issue</h3>
<div class="card">
  <div class="card-header">
    <div class="card-body">
      <form action="{{ route('issue.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <input type="radio" name="is_private" id="is_private" onclick="change(this)">
          <label for="is_private">Private</label>
        </div>
        <div class="mb-3">
          <label id="project_label" for="project">Project</label>
          <input id="project" name="project" type="text" class="form-control @error('project')
            is_invalid
        @enderror" required value="{{ old('project') }}" />
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
        @enderror" required value="{{ old('tracker') }}" />
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
        @enderror" required value="{{ old('subject') }}" />
          @error('subject')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label id="description_label" for="description">Description</label>
          <input name="description" id="description" cols="30" rows="10" required value="{{ old('description') }}" class="form-control @error('description')
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
        @enderror" required value="{{ old('status') }}" />
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
        @enderror" required value="{{ old('priority') }}" />
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
        @enderror" required value="{{ old('start_date') }}" />
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
        @enderror" required value="{{ old('end_date') }}" />
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
        @enderror" required value="{{ old('c_action') }}" />
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
        @enderror" required value="{{ old('category') }}" />
          @error('category')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label id="assignee_label" for="assignee">Assignee</label>
          <input id="assignee" name="assignee" type="text" class="form-control @error('assignee')
            is_invalid
        @enderror" required value="{{ old('assignee') }}" />
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
          <input id="file" name="file" type="file" class="form-control form-control-file @error('file')
            is_invalid
        @enderror" value="{{ old('file') }}" onchange="return showPreview(this)" />
          @error('file')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- <div class="mb-3">
          <label id="meet_id_label" for="meet_id">Meet</label>
          <select class="form-select" id="meet_id" name="meet_id">
          @foreach ($meets as $meet)
            @if(old('meet_id') == $meet->meet_id)
            <option value="{{ $meet->meet_id }}" selected>{{ $meet->meet_name }}</option>
        @else
        <option value="{{ $meet->meet_id }}">{{ $meet->meet_name }}</option>
        @endif
        @endforeach
        </select>
        @error('meet_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div> --}}
    <button type="submit" class="btn btn-sm btn-success">Save</button>
    </form>

    <script>
      const { value } = document.getElementById('is_private');

      const change = (e) => {
        e.preventDefault();
        if (value) {
          value = 1;
        } else {
          value = 0;
        }
      }

      const showPreview = (objFileInput) => {
        if (objFileInput.files[0]) {
          var fileReader = new FileReader();
          fileReader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $("#targetLayer").html('<img src="' + e.target.result + '" class="img-fluid w-25 h-25 m-md-2" />');
            $("#targetLayer").css('opacity', '0.7');
            $(".icon-choose-image").css('opacity', '0.5');
          }
          fileReader.readAsDataURL(objFileInput.files[0]);
        }
      }

    </script>
  </div>
</div>
</div>
@endsection
