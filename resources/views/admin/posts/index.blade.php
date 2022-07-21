@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <a class="btn btn-primary"href="{{route('admin.posts.create')}}">Add Post</a>
    </div>


    <div class="d-flex p-3 bg-dark text-white" >
        <div class="col-1">Id</div>
        <div class="col-2">Titolo</div>
        <div class="col-2">Slug</div>
        <div class="col-4">Riassunto</div>
        <div class="col-1">Stato</div>
        <div class="col-2">azioni</div>
    </div>
        @foreach ($posts as $idx => $post )
        <div class="d-flex p-3 
        @if ($idx%2==0)
            bg-light text-dark
        @endif">
            <div class="col-1 d-flex align-items-center">{{$post->id}}</div>
            <div class="col-2">{{$post->title}}</div>
            <div class="col-2">{{$post->slug}}</div>
            <div class="col-4 text-truncate d-flex align-items-center">{{$post->content}}</div>
            <div class="col-1 d-flex align-items-center">
                @if ($post->is_public)
                    <span class="badge badge-pill badge-success">PUBBLICO</span>
                @else
                    <span class="badge badge-pill badge-secondary">PRIVATO</span>
                @endif
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-primary mx-2 "><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-warning "><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.posts.destroy', $post->slug )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-2"><i class="fa-regular fa-trash-can"></i></button>
                </form> 
            </div>
        </div>
        @endforeach
</div>
@endsection
