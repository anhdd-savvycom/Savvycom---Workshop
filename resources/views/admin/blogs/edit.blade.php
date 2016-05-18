@extends('layouts.master')

@section('content')
<div class="container">
    <form action="/admin/blogs/doEdit" class="form-horizontal" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $blog->id }}">

        <h4 class="clearfix">
            Edit Blog: {{ $blog->title }}

            <button type="submit" class="btn btn-default pull-right">Done</button>
        </h4>

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title" class="control-label col-md-2">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ old('title', $blog->title) }}" id="title" name="title">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description" class="control-label col-md-2">Description</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ old('description', $blog->description) }}" id="description" name="description">
                <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="content" class="control-label col-md-2">Content</label>
            <div class="col-md-10">
                <textarea name="content" id="textarea" cols="30" rows="10" class="form-control">
                    {{ old('content', $blog->content) }}
                </textarea>
                <span class="text-danger">{{ $errors->first('content') }}</span>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nav-blogs').addClass('active')

            CKEDITOR.replace('textarea', {
                filebrowserUploadUrl: baseUrl + "/ckeditorUpload"
            });
        });
    </script>
@endsection