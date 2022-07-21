@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        Lista post: {{ $tag->name }}
                    </div>
                    <div>
                        <a href="{{route('admin.tags.index')}}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <ul>
                        @foreach ($tag->posts as $post)
                        <li><a href="{{route('admin.posts.show', $post->slug)}}">{{$post->title}}</a></li>

                        @endforeach
                    </ul>
                </div>
            </div>
    </div>
</div>
@endsection
