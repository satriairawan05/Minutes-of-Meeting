@extends('layout.main')

@section('content')
<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Edit Document</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Document</li>
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
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('document.update',$document->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3 col-12">
                            <label id="document_label" for="doc_document" class="form-label">Document</label>
                            <div id="targetLayer"></div>
                            <div class="icon-choose-image"></div>
                            <img src="{{ asset('storage/'. $document->doc_document) }}" alt="{{ $doc->id }}" name="oldFile" id="oldFile" class="img-responsive w-25 h-25 opacity-7 img-fluid m-md-2">
                            <input type="file" name="doc_document" id="doc_document" class="form-control form-control-file" onchange="showPreview(this)">
                            @error('doc_document')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Upload</button>
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
                            $("#targetLayer").html('<img src="' + e.target.result + '" class="img-responsive w-25 h-25 img-fluid m-md-2" />');
                            $("#targetLayer").css('opacity', '0.7');
                            $(".icon-choose-image").css('opacity', '0.5');
                        }
                        fileReader.readAsDataURL(objFileInput.files[0]);
                    }
                }

            </script>
            <!-- Row end -->
        </div>
    </div>
    <!-- End Main Content-->

</div>
@endsection
