@extends('layout.main') @section('content')
<!-- Start page wrapper -->
<link
  href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
  rel="stylesheet"
/>
<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Archive</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Datatable of Archive
            </li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <!-- Add New Archive Button -->
        {{--
        <form
          action="{{ route('archive.issue.store',$issues->issue_id) }}"
          method="post"
        >
          @csrf @foreach ($issues as $isu)
          <input
            type="hidden"
            name="issue_id"
            id="issue_id"
            value="{{ $isu->issue_id }}"
          />
          @endforeach
          <a
            type="submit"
            id="submit"
            data-toggle="tooltip"
            title="Add new data"
            type="button"
            class="btn btn-light px-4"
            ><i class="bx bx-plus-circle"></i>Add Archive</a
          >
        </form>
        --}}
      </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
      <div class="card-body">
        <table id="example2" class="table table-hover table-mc-light">
          <thead class="table-header text-center">
            <tr>
              <th>#</th>
              <th>Meeting ID</th>
              <th>Meeting</th>
              <th>Date Of Meeting</th>
              <th>Time Of Meeting</th>
              <th>Minutes Prepared by</th>
              <th>Meeting Departemen</th>
              <th>Meeting Location</th>
              <th>Meeting Attendees</th>
              <th>Meeting Status</th>
              <th>Issue ID</th>
              {{--
              <th>Edit</th>
              --}} {{--
              <th>Delete</th>
              --}}
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($meets as $a)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{!! $a->meet_xid !!}</td>
              <td>{!! $a->meet_name !!}</td>
              <td>
                {{ \Carbon\Carbon::parse($a->meet_date)->format('d-m-Y') }}
              </td>
              <td>{{ \Carbon\Carbon::parse($a->meet_time)->format('H:i') }}</td>
              <td>{{ $a->meet_preparedby }}</td>
              <td>{{ $a->tracker }}</td>
              <td>{{ $a->meet_locate }}</td>
              <td>{{ $a->meet_attend }}</td>
              <td>
                {{ $a->archive_status == 1 ? 'Telah dilaksanakan' : 'Belum
                dilaksanakan' }}
              </td>
              <td>{{ $a->issue_xid }}</td>
              {{--
              <td>
                <button
                  type="button"
                  onclick="window.location='{{ route('archive.edit', $a->archive_id) }}'"
                  data-toggle="tooltip"
                  class="btn ripple btn-primary btn-sm"
                  title="Edit Data"
                >
                  <i class="fas fa-edit"></i>
                </button>
              </td>
              --}} {{--
              <td>
                <button
                  type="button"
                  class="btn ripple btn-danger btn-sm"
                  data-toggle="tooltip"
                  title="Delete Data"
                  data-bs-toggle="modal"
                  data-bs-target="#deleteModal{{ $a->archive_id }}"
                  onclick="{{ route('archive.destroy', $a->archive_id) }}"
                >
                  <i class="far fa-trash-alt"></i>
                </button>
              </td>
              --}}
            </tr>
            {{--
            <div
              class="modal fade"
              id="deleteModal{{ $a->archive_id }}"
              tabindex="-1"
              role="dialog"
              aria-labelledby="deleteModalLabel{{ $a->archive_id }}"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5
                      class="modal-title"
                      id="deleteModalLabel{{ $a->archive_id }}"
                    >
                      Delete Data
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah anda yakin?</div>
                  <div class="modal-footer">
                    <form
                      onsubmit="return deleteData('{{ $a->archive_id }}')"
                      method="POST"
                      action="{{ route('issue.destroy', $a->archive_id) }}"
                    >
                      @csrf
                      <button
                        type="button"
                        class="btn bg-gradient-secondary"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                      @method('DELETE')
                      <button
                        type="submit"
                        class="btn bg-gradient-danger"
                        data-bs-dismiss="modal"
                      >
                        Delete
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            --}} @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End page wrapper -->
@endsection @section('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Buttons -->
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
@endsection
