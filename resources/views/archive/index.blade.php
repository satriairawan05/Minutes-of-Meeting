@extends('layout.main')
{{-- @dd($archives) --}}
@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Archive Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Archives Detail</li>
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="card">
                <div class="card-header d-flex justify-content-end align-items-end">
                    {{-- <form action="{{ route('archive.issue.store',$issues->issue_id) }}" method="post">
                    @csrf
                    @foreach ($issues as $isu)
                    <input type="hidden" name="issue_id" id="issue_id" value="{{ $isu->issue_id }}">
                    @endforeach
                    <button type="submit" id="submit" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-folder-plus"></i> Add Archive Issue
                    </button>
                    </form> --}}

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                            <thead class="table-header text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Meeting ID</th>
                                    <th>Meeting</th>
                                    <th>Date Of Meeting</th>
                                    <th>Time Of Meeting</th>
                                    <th>Minutes Prepared by</th>
                                    <th>Meeting Locate</th>
                                    <th>Meeting Attendees</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($archives as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $a->meet_xid !!}</td>
                                    <td>{!! $a->meet_name !!}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($a->meet_date)->format('l, d M Y') }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($a->meet_time)->format('H:i') }}</td>
                                    <td>{{ $a->meet_preparedby }}</td>
                                    <td>{{ $a->meet_locate }}</td>
                                    <td>{{ $a->meet_attend }}</td>
                                    {{-- start modal  --}}
                                    {{-- <td> --}}
                                        {{-- Edit Modal Trigger --}}
                                        {{-- <button type="button" onclick="window.location='{{ route('archive.edit', $a->archive_id) }}'" data-toggle="tooltip" class="btn ripple btn-primary btn-sm" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                        </button> --}}
                                        {{-- End of Edit Modal Trigger --}}
                                        {{-- Delete Modal Trigger --}}
                                        {{-- <button type="button" class="btn ripple btn-danger btn-sm" data-toggle="tooltip" title="Delete Data" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $a->archive_id }}" onclick="{{ route('archive.destroy', $a->archive_id) }}">
                                        <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                        {{-- End of Delete Modal Trigger --}}
                                        {{-- Delete Modal --}}
                                        {{-- <div class="modal fade" id="deleteModal{{ $a->archive_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $a->archive_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $a->archive_id }}">Delete
                                                        Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <form onsubmit="return deleteData('{{ $a->archive_id }}')" method="POST" action="{{ route('issue.destroy', $a->archive_id) }}">
                                                        @csrf
                                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-gradient-danger" data-bs-dismiss="modal">Delete</button>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                    </div> --}}
                    {{-- End of Delete Modal --}}
                    {{-- </td> --}}
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
        <script>
            $(document).ready(function() {
                // Hide and Show Columns
                $('#toggleColumns').on('change', function() {
                    var column = $(this).val();
                    $('.' + column).toggle();
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
                }, 5000);
            });

        </script>
        @endif
    </div>
</div>
</div>
@endsection
