@extends('layout.main')



@section('content')
<!--start page wrapper -->
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Issue</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-comment-error"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Issue</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body bg-transparent">
                <form action="/issue/{{ $data->issue_id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_private" name="is_private">
                        <label class="form-check-label" for="is_private">
                            Private
                        </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="issue_xid">ID Issues</label>
                            <input type="hidden" name="issue_id" id="issue_id" value="{{ $data->issue_id }}">
                            <input type="text" class="form-control @error('issue_xid') is-invalid @enderror" id="issue_xid" name="issue_xid" value="{{ $data->issue_xid }}" readonly>
                            @error('issue_xid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label id="project_label" for="project">Meeting</label>
                            <input id="project" name="project" type="text" class="form-control @error('project') is_invalid @enderror" required value="{{ $meet->meet_xid }}" placeholder="Masukan Meeting" readonly />
                            @error('project')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label id="tracker_label" for="tracker">Departemen</label>
                            <select class="form-select form-control form-control-sm" id="tracker" name="tracker">
                                @foreach ($depts as $dept)
                                @if (old('tracker', $data->tracker) == $dept->name)
                                <option name="tracker" value="{{ $dept->name }}" selected>
                                    {{ $dept->name }}
                                </option>
                                @else
                                <option name="tracker" value="{{ $dept->name }}">{{ $dept->name }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                            @error('tracker')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label id="subject_label" for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" class="form-control @error('subject') is_invalid @enderror" required value="{{ old('subject', $data->subject) }}" placeholder="Masukan Subject" />
                            @error('subject')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-6 form-group">
                            <label id="description_label" for="description">Remarks</label>
                            <textarea name="description" id="description" rows="4" required class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Remarks">{{ old('description', $data->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label id="c_action_label" for="c_action">Corrective Action</label>
                            <textarea id="c_action" name="c_action" rows="4" class="form-control @error('c_action') is-invalid @enderror" placeholder="Masukan Corrective Action">{{ old('c_action', $data->c_action) }}</textarea>
                            @error('c_action')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        @php
                        $statuses = array("New","Continue","Over Due","Complete","Closed")
                        @endphp
                        <div class="col-md-6">
                            <label id="status_label" for="status">Status</label>
                            <select class="form-select form-control form-control-sm" name="status">
                                @foreach ($statuses as $status)
                                @if (old('status',$data->status) == $status)
                                <option name="status" value="{{ $status }}" selected>{{ $status }}</option>
                                @else
                                <option name="status" value="{{ $status }}">{{ $status }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @php
                        $priorities = array("Low","Medium","High");
                        @endphp
                        <div class="col-md-6">
                            <label id="priority_label" for="priority">Priority</label>
                            <select class="form-select form-control form-control-sm" name="priority">
                                @foreach ($priorities as $priority)
                                @if (old('priority',$data->priority) == $priority)
                                <option name="priority" value="{{ $priority }}" selected>{{ $priority }}</option>
                                @else
                                <option name="priority" value="{{ $priority }}">{{ $priority }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <label id="start_date_label" for="start_date">Start Date</label>
                            <input id="start_date" name="start_date" type="date" class="form-control @error('start_date') is_invalid @enderror" required value="{{ old('start_date', $data->start_date) }}" />
                            @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label id="end_date_label" for="end_date">End Date</label>
                            <input id="end_date" name="end_date" type="date" class="form-control @error('end_date') is_invalid @enderror" required value="{{ old('end_date', $data->end_date) }}" />
                            @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label id="assignee_label" for="assignee">Assignee</label>
                            <select class="form-select form-control form-control-sm" id="assignee" name="assignee">
                                @foreach ($users as $user)
                                @if (old('assignee', $data->assigne) == $user->name)
                                <option name="assignee" value="{{ $user->name }}" selected>
                                    {{ $user->name }}
                                </option>
                                @else
                                <option name="assignee" value="{{ $user->name }}">{{ $user->name }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                            @error('assignee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label id="pic_label" for="pic">PIC</label>
                            <select class="form-select form-control form-control-sm" id="pic" name="pic">
                                @foreach ($users as $user)
                                @if (old('pic',$data->pic) == $user->name)
                                <option name="pic" value="{{ $user->name }}" selected>
                                    {{ $user->name }}
                                </option>
                                @else
                                <option name="pic" value="{{ $user->name }}">{{ $user->name }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                            @error('assignee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label id="file_label" for="file">File</label>
                            <div id="targetLayer"></div>
                            <div class="icon-choose-image"></div>
                            <img src="{{ asset('storage/' . $data->file) }}" alt="{{ $data->project }}" name="oldFile" id="oldFile" class="img-responsive w-25 h-25 opacity-7 img-fluid m-md-2">
                            <input id="file" name="file" type="file" class="form-control form-control-file @error('file') is_invalid @enderror" value="{{ old('file') }}" onchange="return showPreview(this)" />
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br/>
                    <div class="row mb-3">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="{{ route('issue.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>Issue Datatable</button></a>
                            <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Hide and Show Columns
            $('#toggleColumns').on('change', function() {
                var column = $(this).attr('id');
                $('.' + column).toggle();
            });

            // Expandable Columns
            $('.expandable-column').on('click', function() {
                $(this).toggleClass('expanded');
                $(this).siblings('.expand-content').toggle();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Hide and Show Columns
            $('#toggleColumns').on('change', function() {
                var column = $(this).val();
                $('.' + column).toggle();
            });
        });
    </script>


</div>
</div>
</div>

<script>
    const olfFile = document.getElementById('oldFile');
    const newFile = document.getElementById('file');

    newFile.addEventListener('change', function(e) {
        oldFile.classList.add("d-none");
    });

    const showPreview = (objFileInput) => {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                $("#targetLayer").html('<img src="' + e.target.result +
                    '" class="img-responsive w-25 h-25 img-fluid m-md-2" />');
                $("#targetLayer").css('opacity', '0.7');
                $(".icon-choose-image").css('opacity', '0.5');
            }
            fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }
</script>
@endsection