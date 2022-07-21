@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                       Modifica post
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.posts.update', $post->slug)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="form-title">Titolo del Post</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="form-title" name="title"  value="{{ old('title', $post->title) }}">
                          @error('title')
                          <small class="form-text text-muted alert alert-danger">{{ $message }}</small>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="form-content">Contento</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="form-content" name="content" rows="20"> {{ old('content', $post->content) }} </textarea>                 
                            @error('content')
                            <small class="form-text text-muted alert alert-danger">{{ $message }}</small>
                            @enderror          
                        </div>
                        <div class="form-group">
                            <p>Tags</p>
                            @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', $postTags)) ? 'checked' : ''}}>
                                <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="category">Categoria</label>
                          <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                              <option value="">Seleziona Categoria</option>
                              @foreach ($categories as $category)
                                  <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                              @endforeach
                          </select>
                          @error('category_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="form-public-post" name="is_public" {{ old('is_public', $post->is_public) ? 'checked' : ''}}>
                          <label class="form-check-label" for="form-public-post">Pubblica</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifica Post</button>
                      </form>                 
                </div>
            </div>
    </div>
</div>
@endsection
