<div class=" position-sticky" style="top: 80px">
    <div class="form-search mb-4">
        <form action="">
            <p class="mb-2 fw-bold">Article Search</p>
            <div class="input-group">
                <input type="text" class="form-control"
                 @if(request()->has('keyword')) 
                    value="{{ request()->keyword }}"
                 @endif name="keyword">
                <button class="btn btn-dark">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    
    <div class="catogories mb-4">
        <p class="mb-2 fw-bold">Article Categories</p>
        <div class="list-group">
            <a href="{{ route('index') }}"
                class="list-group-item list-group-item-action">
                All Categories
               </a>
            @foreach (App\Models\Category::all() as $category)
                <a href="{{ route('categorized',$category->slug) }}"
                 class="list-group-item list-group-item-action">
                 {{ $category->title }}
                </a>
            @endforeach
        </div>
    </div>
    
    <div class="recent-articles mb-4">
        <p class="mb-2 fw-bold">Recent Article</p>
        <div class="list-group">
            @foreach (App\Models\Article::latest('id')->limit(5)->get() as $article)
                <a href="{{ route('detail',$article->slug) }}"
                 class="list-group-item list-group-item-action">
                 {{ $article->title }}
                </a>
            @endforeach
        </div>
    </div>
</div>