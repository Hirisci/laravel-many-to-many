@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h2>
                            {{ $post->title }}
                            @if ($post->category)
                            <span class="badge badge-pill badge-secondary">{{$post->category->name}}</span>
                            @endif
                        </h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="px-2">
                            @if ($post->is_public)
                                <span class="badge badge-pill badge-success">PUBBLICO</span>
                            @else
                                <span class="badge badge-pill badge-secondary">PRIVATO</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-warning "><i class="fa-solid fa-pen"></i></a>
                            <form action="{{route('admin.posts.destroy', $post->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2"><i class="fa-regular fa-trash-can"></i></button>
                            </form> 
                        </div>

                    </div>
                </div>

                <div class="card-body">
                   

                    {{ $post->content }}
                </div>
            </div>
    </div>
</div>
@endsection
