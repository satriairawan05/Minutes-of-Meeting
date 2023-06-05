@extends('layout.main')

@section('content')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Page Header -->
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">Meeting Data</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Meeting</li>
                        </ol>
                    </div>
                    <div class="d-flex">
                        <div class="justify-content-center">
                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                                <i class="fe fe-download mr-2"></i> Import
                            </button>
                            <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                                <i class="fe fe-filter mr-2"></i> Filter
                            </button>
                            <button type="button" class="btn btn-primary my-2 btn-icon-text">
                                <i class="fe fe-download-cloud mr-2"></i> Download Report
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!--Row-->
                <div class="card ">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <a href="{{ route('meet.create') }}" class="btn-data btn text-decoration-none text-black">
                                <i class="fas fa-plus-circle"></i> Add New Data
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered table-hover">
                                    <thead class="table-header">
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;" class="d-none d-sm-table-cell">ID</th>
                                        <th style="text-align: center;">Meeting Name</th>
                                        <th style="text-align: center;">Project Name</th>
                                        <th style="text-align: center;">Date Of Meeting</th>
                                        <th style="text-align: center;">Time Of Meeting</th>
                                        <th style="text-align: center;">Minutes Prepared by</th>
                                        <th style="text-align: center;">Meeting Locate</th>
                                        <th style="text-align: center;" class="d-none d-sm-table-cell">Attendees</th>
                                        <th style="text-align: center;">Actions</th>
                                        </tr>
                                        <tr>
                                            {{-- <th colspan="9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="toggleColumns">
                                            <label class="form-check-label" for="toggleColumns">
                                                Toggle Columns
                                            </label>
                                        </div>
                                    </th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($meets as $d)
                                            <tr>
                                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                                <td style="text-align: center;" class="d-none d-sm-table-cell">
                                                    {{ $d->meet_xid }}</td>
                                                <td style="text-align: center;">{{ $d->meet_name }}</td>
                                                <td style="text-align: center;">{{ $d->meet_project }}</td>
                                                <td style="text-align: center;">{{ $d->meet_date }}</td>
                                                <td style="text-align: center;">{{ $d->meet_time }}</td>
                                                <td style="text-align: center;">{{ $d->meet_preparedby }}</td>
                                                <td style="text-align: center;">{{ $d->meet_locate }}</td>
                                                <td style="text-align: center;" class="d-none d-sm-table-cell">
                                                    {{ $d->meet_attend }}</td>
                                                <td style="text-align: center;">
                                                    {{-- Edit Modal Trigger --}}
                                                    <button type="button"
                                                        onclick="window.location='{{ route('meet.edit', $d->meet_id) }}'"
                                                        class="btn bg-gradient-info" title="Edit Data">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    {{-- End of Edit Modal Trigger --}}

                                                    {{-- Delete Modal Trigger --}}
                                                    <button type="button" class="btn bg-gradient-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $d->meet_id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    {{-- End of Delete Modal Trigger --}}

                                                    {{-- Delete Modal --}}
                                                    <div class="modal fade" id="deleteModal{{ $d->meet_id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $d->meet_id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $d->meet_id }}">Delete
                                                                        Data</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        onsubmit="return deleteData('{{ $d->meet_name }}')"
                                                                        method="POST"
                                                                        action="{{ route('meet.destroy', $d->meet_id) }}">
                                                                        @csrf
                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">Close</button>

                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn bg-gradient-danger"
                                                                            data-bs-dismiss="modal">Delete</button>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- End of Delete Modal --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                    @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var successAlert = document.getElementById('success-alert');
                            successAlert.style.display = 'block';
                            setTimeout(function() {
                                successAlert.style.display = 'none';
                            }, 5000); // Adjust the timeout value (in milliseconds) as needed
                        });
                    </script>
                @endif
                    <!-- Row end -->
                </div>
                <!-- End Main Content-->
            @endsection