@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default panel-blog">
            <div class="panel-body">
                <h3>
                    {{ $blog->title }}
                    <div class="time">
                        <span class="glyphicon glyphicon-time"></span>
                        {{ $blog->created_at }}
                    </div>
                </h3>

                <p class="description">
                    {{ $blog->description }}
                </p>

                <p class="content">
                    {!! $blog->content !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
