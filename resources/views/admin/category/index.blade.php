@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">

        <a class="btn btn-primary"href="{{route('admin.category.create')}}">Add Category</a>
    </div>


    <div class="d-flex p-3 bg-dark text-white" >
        <div class="col-1">N* Post</div>
        <div class="col">Name</div>
        <div class="col-2">Slug</div>
        <div class="col-2">Azioni</div>
    </div>
        @foreach ($categories as $idx => $category )
            <div class="d-flex p-3 
        @if ($idx%2==0)
            bg-light text-dark
        @endif">
            <div class="col-1 d-flex align-items-center">{{count($category->posts)}}</div>
            <div class="col">{{$category->name}}</div>
            <div class="col-2">{{$category->slug}}</div>
            <div class="col-2 d-flex justify-content-center align-items-center">
                <a href="{{route('admin.category.show', $category->slug)}}" class="btn btn-primary mx-2 "><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="{{route('admin.category.edit', $category->slug)}}" class="btn btn-warning "><i class="fa-solid fa-pen"></i></a>
                <form action="{{route('admin.category.destroy', $category->slug )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mx-2"><i class="fa-regular fa-trash-can"></i></button>
                </form> 
            </div>
        </div>
        @endforeach
</div>
@endsection
