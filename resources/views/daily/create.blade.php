@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Add DWM Report</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/daily">DWM Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add DWM Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
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
                                    <label id="assignee_label" for="assignee">PIC</label>
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
