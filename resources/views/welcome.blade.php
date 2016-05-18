@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @foreach($blogs as $blog)
        <div class="panel panel-default panel-blog">
            <div class="panel-body">
                <h3>
                    {{ $blog->title }}
                    <div class="time">
                        <span class="glyphicon glyphicon-time"></span>
                        {{ $blog->created_at }}
                    </div>
                </h3>

                <p>
                    {{ $blog->description }}
                </p>

                <a href="/blogs/{{ $blog->id }}">Read more...</a>
            </div>
        </div>
        @endforeach

        {!! $blogs->links() !!}
    </div>
</div>
@endsection
