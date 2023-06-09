@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Issue Data</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Issue Details</li>
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
                    <a href="{{ route('issue.create') }}" class="btn-data btn text-decoration-none text-black">
                        <i class="fas fa-plus-circle"></i> Add New Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                    @foreach ($issues as $issue)
                        <a href="{{ route('issue.show',strtolower($issue->tracker)) }}" class="list-group-item list-group-item-action">Departemen {{ $issue->tracker }}</a>
                    @endforeach
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
                    }, 5000); // Adjust the timeout value (in milliseconds) as needed
                });
            </script>
            @endif

        </div>
    </div>
</div>
<!-- End Main Content-->
@endsection
