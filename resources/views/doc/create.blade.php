@extends('layout.main')

@section('content')
<form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label id="document_label" for="doc_document">Document</label>
        <input type="file" name="doc_document" id="doc_document" class="form-control form-control-file" onchange="showPreview(this)">
        @error('doc_document')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success btn-sm">Upload</button>
</form>

<script>
    const showPreview = (objFileInput) => {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                $("#targetLayer").html('<iframe src="' + e.target.result + '" class="img-fluid w-25 h-25 m-md-2" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>');
                $("#targetLayer").css('opacity', '0.7');
                $(".icon-choose-image").css('opacity', '0.5');
            }
            fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

</script>
@endsection
