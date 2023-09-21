@extends('layouts.app')

@section('content')
  

   <div class="container">
    <div class="row">
        <div class="col-12">
            @if (session('message'))
       <div class="alert alert-success">
          {{session('message')}}
       </div>
   @endif

  
            <h3>Category List</h3>
            <hr>

            <div class="">
                <a href="{{route('category.create')}}"
                  class="btn btn-outline-dark">
                Create</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Control</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            {{ $category->title }}
                            <br>
                            <span class="small text-black-50">
                                {{ Str::limit($category->description,20,'...') }}
                            </span>
                        </td>
                        
                        <td>{{ $category->user->name}} </td>
                        <td>
                            <div class="btn-group">
                            @can('update', $category)
                                <a  class="btn btn-sm btn-outline-dark"
                            href="{{route('category.edit',$category->id)}}">
                            <i class="bi bi-pencil"></i>
                            </a>
                            @endcan

                            @can('delete', $category)
                            <button form="articleDeleteForm{{$category->id}}" class="btn btn-sm btn-outline-dark">
                                <i class="bi bi-trash3"></i>
                            </button>
                            @endcan
                            </div>

                            <form id="articleDeleteForm{{$category->id}}" class="d-inline-block" action="{{route('category.destroy',$category->id)}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        <td>
                            <p class="small">
                                <i class="bi bi-calendar"></i>
                                {{ $category->created_at->format("D M Y") }}
                            </p>
                            <p class="small">
                                <i class="bi bi-clock"></i>
                                {{ $category->created_at->format("h:i a") }}
                            </p>
                        </td>
                        <td>
                            
                            <p class="small m-0">
                                <i class="bi bi-calendar"></i>
                                {{ $category->created_at->format("D M Y") }}
                            </p>
                            <p class="small m-0">
                                <i class="bi bi-clock"></i>
                                {{ $category->created_at->format("h:i a") }}
                            </p>
                        </td>
                    </tr>
                   
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            There is no record
                            <a class="btn btn-outline-primary" href="{{route('category.create')}}">Create Here</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        
            
        </div>
    </div>
   </div>

   

    

   
@endsection