@extends('main')

@section('title', 'sv. Silvestra | Kanfanar')

@section('content')
    <h3>File Upload</h3>
    <div>
        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="file" id="file">
            <button type="submit">Upload</button>
        </form>
    </div>
@endsection