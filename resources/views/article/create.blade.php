@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Create New Article</h3>

          <hr>

         <form action="{{ route('article.store')}}" method="post">
          @csrf
           <div class="mb-3">
        <label for="" class="form-label">Article title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror "
        name="title" value="{{ old('title')}}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" class="form-control
             @error('description') is-invalid @enderror " rows="7"></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Select Category</label>
            <select name="category" id="" class="form-select 
            @error('category')
                is-invalid
            @enderror " >

            @foreach (App\Models\category::all() as $category)
            <option value="{{$category->id}}"
             {{old('category') == $category->id ? 'selected' : '' }} >
                {{ $category->title }}
            </option>
            @endforeach

            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

         <button class="btn btn-primary">Save Article</button>
        </div>
        </form>
        </div>
    </div>
</div>
    
@endsection