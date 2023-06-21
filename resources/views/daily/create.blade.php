@extends('layout.main')

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">DWM Report</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file-find"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Add Tracker Departement</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body bg-transparent">
                <form action="/daily" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_private" name="is_private" value="1">
                        <label class="form-check-label" for="is_private">
                            Private
                        </label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="daily_xid">ID Daily</label>
                            <input type="text" class="form-control @error('daily_xid') is-invalid @enderror" id="daily_xid" name="daily_xid" value="{{ $daily }}" readonly>
                            @error('daily_xid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                            <div class="col-md-6">
                                <label id="subject_label" for="subject">Subject</label>
                                <input id="subject" name="subject" type="text" class="form-control @error('subject') is_invalid @enderror" required placeholder="Masukan Subject" value="{{ old('subject') }}" />
                                @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label id="departemen_label" for="departemen">Departemen</label>
                                <select class="form-select form-control form-control-sm" id="departemen" name="departemen">
                                    @if(old('departemen') == null)
                                    <option name="departemen">Masukan Departemen</option>
                                    @endif
                                    @foreach ($depts as $dept)
                                    @if (old('departemen') == $dept->name)
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
                            <div class="col-md-6">
                                <label id="status_label" for="status">Priority</label>
                                <select class="form-select form-control form-control-sm" name="status">
                                    <option name="status" value="High" selected>High</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-13">
                            <label id="description_label" for="description_daily">Problem Identification</label>
                            <textarea type="text" name="description_daily" id="description_daily" value="{{ old('description_daily') }}" class="form-control @error('description') is-invalid @enderror" placeholder="Masukan Description"></textarea>
                            @error('description_daily')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-13">
                            <label id="c_action_label" for="c_action">Corrective Action</label>
                            <textarea id="c_action" name="c_action" rows="14" type="text" class="form-control @error('c_action') is-invalid @enderror" value="{{ old('c_action') }}" placeholder="Masukan Corrective Action"></textarea>
                            @error('c_action')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label id="start_date_label" for="start_date">Start Date</label>
                                <input id="start_date" name="start_date" type="date" class="form-control @error('start_date') is_invalid @enderror" required value="{{ old('start_date') }}" placeholder="dd/mm/yyyy" />
                                @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label id="end_date_label" for="end_date">End Date</label>
                                <input id="end_date" name="end_date" type="date" class="form-control @error('end_date') is_invalid @enderror" required value="{{ old('end_date') }}" placeholder="dd/mm/yyyy" />
                                @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                        <div class="row mb-3">
                            <div class="col-12">
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
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <a href="{{ route('daily.index') }}" class="btn btn-light px-2"><i class='bx bx-left-arrow-alt mr-1'></i>DWM Report</a>
                                <button type="submit" class="btn btn-light px-2"><i class='bx bx-save'></i>Save Changes</button>
                            </div>
                        </div>
                </form>
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
