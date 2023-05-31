@extends('layout.main')

@section('content')
<h3 class="mb-2">Add Issue</h3>
<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="/issue" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_private" name="is_private" value="1">
                    <label class="form-check-label" for="is_private">
                        Private
                    </label>
                </div>
                <div class="mb-3">
                    <label for="issue_xid">ID Issues</label>
                    <input type="text" class="form-control @error('issue_xid') is-invalid @enderror" id="issue_xid" name="issue_xid" value="{{ $issue }}" readonly>
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
        @enderror" required value="{{ old('project') }}" placeholder="Masukan Project" />
                    @error('project')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label id="departemen_label" for="departemen">Departemen</label>
                    <input id="departemen" name="departemen" type="text" class="form-control @error('departemen')
            is_invalid
        @enderror" required value="{{ old('departemen') }}" placeholder="Masukan Departemen" />
                    @error('departemen')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label id="subject_label" for="subject">Subject</label>
                    <input id="subject" name="subject" type="text" class="form-control @error('subject')
            is_invalid
        @enderror" required value="{{ old('subject') }}" placeholder="Masukan Subject" />
                    @error('subject')
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
                    <label id="c_action_label" for="c_action">Corrective Action</label>
                    <input id="c_action" name="c_action" type="text" class="form-control @error('c_action')
            is_invalid
        @enderror" required value="{{ old('c_action') }}" placeholder="Masukan Corrective Action" />
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
                    <label id="category_label" for="category">Category</label>
                    <input id="category" name="category" type="text" class="form-control @error('category')
            is_invalid
        @enderror" required value="{{ old('category') }}" placeholder="Masukan Category" />
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
        @enderror" required value="{{ old('assignee') }}" placeholder="Masukan Assignee" />
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
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </form>

        </div>
    </div>
</div>
<script>
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
@endsection
