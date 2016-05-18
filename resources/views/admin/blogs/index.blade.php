@extends('layouts.master')

@section('content')
    @include('elements.notification')

    <div class="row">
        <div class="col-md-12">
            <a href="/admin/blogs/add" class="btn btn-primary btn-sm">
                Add New
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped table-blogs">
        <tr>
            <th width="40px">#</th>
            <th width="250px">Title</th>
            <th>Description</th>
            <th width="180px">Created At</th>
            <th width="180px">Actions</th>
        </tr>

        <?php $num = ($blogs->currentPage() - 1) * $blogs->perPage() ?>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ ++$num }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->description }}</td>
            <td>{{ $blog->created_at }}</td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                        <a href="/admin/blogs/edit/{{ $blog->id }}" class="btn btn-default btn-sm btn-block">Edit</a>
                    </div>
                    <div class="col-md-6">
                        <a href="/admin/blogs/delete/{{ $blog->id }}" class="btn btn-danger btn-sm btn-block btn-delete">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $blogs->links() !!}
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#nav-blogs').addClass('active')

            $('.btn-delete').on('click', function (e) {
                if (!confirm('Are you sure you want to delete this blog?')) {
                    e.preventDefault()
                }
            })
        })
    </script>
@endsection