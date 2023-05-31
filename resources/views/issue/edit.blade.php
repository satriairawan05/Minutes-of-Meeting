@extends('layout.dashboard')

@section('content')
<form action="/issue/{{ $data->issue_id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="is_private" name="is_private">
        <label class="form-check-label" for="is_private">
            Private
        </label>
    </div>
    <div class="mb-3">
        <label for="issue_xid">ID Issues</label>
        <input type="text" class="form-control @error('issue_xid') is-invalid @enderror" id="issue_xid" name="issue_xid" value="{{ $data->issue_xid }}" readonly>
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
        @enderror" required value="{{ old('project', $data->project) }}" placeholder="Masukan Project" />
        @error('project')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label id="tracker_label" for="tracker">Departemen</label>
        <input name="tracker" id="tracker" required value="{{ old('tracker') }}" class="form-control @error('tracker')
        is-invalid
    @enderror" placeholder="Masukan tracker" />
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
        @enderror" required value="{{ old('subject', $data->subject) }}" placeholder="Masukan Subject" />
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
    @enderror" placeholder="Masukan Description" />
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label id="c_action_label" for="c_action">Corrective Action</label>
        <input id="c_action" name="c_action" type="text" class="form-control @error('c_action')
            is_invalid
        @enderror" required value="{{ old('c_action', $data->c_action) }}" placeholder="Masukan Corrective Action" />
        @error('c_action')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label id="status_label" for="status">Status</label>
        <select class="form-select" name="status">
            <option name="status" value="New">New</option>
            <option name="status" value="Continue">Continue</option>
            <option name="status" value="Progress">Progress</option>
            <option name="status" value="Over Due">Over Due</option>
            <option name="status" value="Closed">Closed</option>
        </select>
        @error('status')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label id="priority_label" for="priority">Priority</label>
        <select class="form-select" name="priority">
            <option name="priority" value="Low">Low</option>
            <option name="priority" value="Medium">Medium</option>
            <option name="priority" value="High">High</option>
        </select>
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
        @enderror" required value="{{ old('start_date', $data->start_date) }}" />
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
        @enderror" required value="{{ old('end_date', $data->end_date) }}" />
        @error('end_date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label id="assignee_label" for="assignee">Assignee</label>
        <input id="assignee" name="assignee" type="text" class="form-control @error('assignee')
            is_invalid
        @enderror" required value="{{ old('assignee',$data->assignee) }}" placeholder="Masukan Assignee" />
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
        @enderror" value="{{ old('file') }}" onchange="return showPreview(this)" />
        @error('file')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-sm btn-success">Save</button>
</form>

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
