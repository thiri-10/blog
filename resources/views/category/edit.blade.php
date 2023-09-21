@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Edit Category</h3>

          <hr>

         <form action="{{ route('category.update',$category->id)}}" method="post">
          @csrf
          @method('put')
           <div class="mb-3">
           <label for="" class="form-label">Category title</label>
           <input type="text" class="form-control @error('title') is-invalid @enderror "
            name="title" value="{{ old('title',$category->title)}}">
           @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        
        </div>
        <button class="btn btn-primary">Update Category</button>
        </form>
        </div>
    </div>
</div>
    
@endsection