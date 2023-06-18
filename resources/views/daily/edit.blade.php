@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Edit DWM Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/daily">DWM Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit DWM Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-body bg-transparent">
                    <form action="/daily/{{ $daily->daily_id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_private" name="is_private" value="1">
                            <label class="form-check-label" for="is_private">
                                Private
                            </label>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="daily_xid">ID Daily</label>
                            <input type="hidden" name="daily_id" id="daily_id" value="{{ $daily->daily_id }}">
                            <input type="text" class="form-control @error('daily_xid') is-invalid @enderror" id="daily_xid" name="daily_xid" value="{{ $daily->daily_xid }}" readonly>
                            @error('daily_xid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label id="subject_label" for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" class="form-control @error('subject')
            is_invalid
        @enderror" required placeholder="Masukan Subject" value="{{ old('subject', $daily->subject) }}" />
                            @error('subject')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 row col-12">
                            <div class="col-6">
                                <label id="departemen_label" for="departemen">Departemen</label>
                                <select class="form-select form-control form-control-sm" id="departemen" name="departemen">
                                    @if(old('departemen') == null)
                                    <option name="departemen">Masukan Departemen</option>
                                    @endif
                                    @foreach ($depts as $dept)
                                    @if (old('departemen',$daily->departemen) == $dept->name)
                                    <option name="departemen" value="{{ $dept->name }}" selected>{{ $dept->name }}
                                    </option>
                                    @else
                                    <option name="departemen" value="{{ $dept->name }}">{{ $dept->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label id="tracker_label" for="tracker_id">Tracker</label>
                                <select class="form-select form-control form-control-sm" id="tracker_id" name="tracker_id">
                                    @if(old('tracker_id') == null)
                                    <option name="tracker_id">Masukan Tracker</option>
                                    @endif
                                    @foreach ($trackers as $tracker)
                                    @if (old('tracker_id',$daily->tracker_id) == $tracker->tracker_id)
                                    <option name="tracker_id" value="{{ $tracker->tracker_id }}" selected>{{ $tracker->tracker_name }}
                                    </option>
                                    @else
                                    <option name="tracker_id" value="{{ $tracker->tracker_id }}">{{ $tracker->tracker_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('tracker')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label id="description_label" for="escription_daily">Description</label>
                            <input type="text" name="description_daily" id="description_daily" required value="{{ old('description_daily', $daily->escription_daily) }}" class="form-control @error('description_daily')
        is-invalid
    @enderror" placeholder="Masukan Description" />
                            @error('description_daily')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row col-12">
                            @php
                            $statuses = array("New","Continue","Over Due","Complete","Closed")
                            @endphp
                            <div class="col-6">
                                <label id="status_label" for="status">Status</label>
                                <select class="form-select form-control form-control-sm" name="status">
                                    @foreach ($statuses as $status)
                                    @if (old('status') == $status)
                                    <option name="status" value="{{ $status }}" selected>{{ $status }}</option>
                                    @else
                                    <option name="status" value="{{ $status }}">{{ $status }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label id="priority_label" for="priority">Priority</label>
                                <select class="form-select form-control form-control-sm" name="priority">
                                    <option name="priority" value="High" selected>High</option>
                                </select>
                                @error('priority')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label id="c_action_label" for="c_action">Corrective Action</label>
                            <input id="c_action" name="c_action" type="text" class="form-control @error('c_action')
            is_invalid
        @enderror" value="{{ old('c_action', $daily->c_action) }}" placeholder="Masukan Corrective Action" />
                            @error('c_action')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row col-12">
                            <div class="col-6">
                                <label id="start_date_label" for="start_date">Start Date</label>
                                <input id="start_date" name="start_date" type="date" class="form-control @error('start_date')
            is_invalid
        @enderror" required value="{{ old('start_date', $daily->start_date) }}" />
                                @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label id="end_date_label" for="end_date">End Date</label>
                                <input id="end_date" name="end_date" type="date" class="form-control @error('end_date')
            is_invalid
        @enderror" required value="{{ old('end_date', $daily->end_date) }}" />
                                @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 col-12">
                            <div class="col-6">
                                <label id="assignee_label" for="assignee">Assignee</label>
                                <select class="form-select form-control form-control-sm" id="assignee" name="assignee">
                                    @foreach ($users as $user)
                                    @if (old('assignee') == $user->name)
                                    <option name="assignee" value="{{ $user->name }}" selected>
                                        {{ $user->name }}</option>
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
                            <div class="col-6">
                                <label id="pic_label" for="pic">PIC</label>
                                <select class="form-select form-control form-control-sm" id="pic" name="pic">
                                    @foreach ($users as $user)
                                    @if (old('pic') == $user->name)
                                    <option name="pic" value="{{ $user->name }}" selected>
                                        {{ $user->name }}</option>
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
                        <div class="row mb-3 col-12">
                            <label id="file_label" for="file">File</label>
                            <div id="targetLayer"></div>
                            <div class="icon-choose-image"></div>
                            <input id="file" name="file" type="file" class="form-control form-control-file @error('file') is_invalid @enderror" value="{{ old('file') }}" onchange="return showPreview(this)" />
                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <a href="{{ route('daily.index') }}" class="btn btn-md btn-primary mr-3">Back</a>
                            <button type="submit" class="btn btn-md btn-success">Submit</button>
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
        oldFile.style.display = 'none';
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
