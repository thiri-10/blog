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

   

  
            <h3>Article List</h3>
            <hr>

            <div class="">
                <a href="{{route('article.create')}}"
                  class="btn btn-outline-dark">
                Create</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Article</th>
                    @can('admin-only')
                       <th>Owner</th>
                    @endcan
                    <th>Category</th>
                    <th>Control</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            {{ $article->title }}
                            <br>
                            <span class="small text-black-50">
                                {{ Str::limit($article->description,20,'...') }}
                            </span>
                        </td>
                        
                        @can('admin-only')
                        <td>{{ $article->user->name }} </td>
                        @endcan
                        <td>{{ $article->category->title ?? 'unknown'}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-dark" 
                            href="{{route('article.show',$article->id)}}">
                            <i class="bi bi-info"></i>
                            </a>
                            @can('update',$article)
                                <a  class="btn btn-sm btn-outline-dark"
                                href="{{route('article.edit',$article->id)}}">
                                <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            

                            @can('delete', $article)
                                <button form="articleDeleteForm{{$article->id}}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            @endcan
                            </div>

                            <form id="articleDeleteForm{{$article->id}}" class="d-inline-block" action="{{route('article.destroy',$article->id)}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        <td>
                            <p class="small">
                                <i class="bi bi-calendar"></i>
                                {{ $article->created_at->format("D M Y") }}
                            </p>
                            <p class="small">
                                <i class="bi bi-clock"></i>
                                {{ $article->created_at->format("h:i a") }}
                            </p>
                        </td>
                        <td>
                            
                            <p class="small m-0">
                                <i class="bi bi-calendar"></i>
                                {{ $article->created_at->format("D M Y") }}
                            </p>
                            <p class="small m-0">
                                <i class="bi bi-clock"></i>
                                {{ $article->created_at->format("h:i a") }}
                            </p>
                        </td>
                    </tr>
                   
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            There is no record
                            <a class="btn btn-outline-primary" href="{{route('article.create')}}">Create Here</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="">
                {{ $articles->onEachSide(1)->links() }}
            </div>
            
        </div>
    </div>
   </div>

   

    

   
@endsection