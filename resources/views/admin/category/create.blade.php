@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                       Crea Categoria
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="form-name">Nome Categoria</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="form-name" name="name" value="{{old('name')}}">
                          @error('name')
                          <small class="form-text text-muted alert alert-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Crea</button>
                      </form>                 
                </div>
            </div>
    </div>
</div>
@endsection
