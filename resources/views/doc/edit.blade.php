@extends('layout.main')

@section('content')
    <form action="{{ route('document.update',$document->id) }}" method="post">
    @csrf
    @method('put')
    @csrf
    <div class="mb-3">
        <label id="document_label" for="document">Document</label>
        <iframe src="{{ asset('storage/'. $document->document) }}" frameborder="0"></iframe>
        <input type="file" name="document" id="document" class="form-control form-control-file" onchange="showPreview(this)">
        @error('document')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success btn-sm">Upload</button>
    </form>
@endsection
