@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">

        <a class="btn btn-primary"href="{{route('admin.tags.create')}}">Add Tag</a>
    </div>


    <div class="d-flex p-3 bg-dark text-white" >
        <div class="col-1">N* Post</div>
        <div class="col">Name</div>
        <div class="col-2">Slug</div>
        <div class="col-2">Azioni</div>
    </div>
        @foreach ($tags as $idx => $tag )
            <div class="d-flex p-3 
        @if ($idx%2==0)
            bg-light text-dark
        @endif">
            <div class="col-1 d-flex align-items-center">{{count($tag->posts)}}</div>
            <div class="col">{{$tag->name}}</div>
            <div class="col-2">{{$tag->slug}}</div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <a href="{{route('admin.tags.show', $tag->slug)}}" class="btn btn-primary mx-2 "><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="{{route('admin.tags.edit', $tag->slug)}}" class="btn btn-warning "><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.tags.destroy', $tag->slug )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-2"><i class="fa-regular fa-trash-can"></i></button>
                </form> 
            </div>
        </div>
        @endforeach
</div>
@endsection
