<div class="container p-0">
    <a href="{{route('post.show',$post->id)}}">
        <img src="{{ $post->image }}" class="w-100" alt="{{ $post->image }}">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- heart button --}}
            <form action="" method="post">
                @csrf
                <button type="submit" class="btn">
                    <i class="fa-regular fa-heart icon-sm"></i>
                </button>
            </form>
        </div>
        <div class="col p-0">
            <strong>3</strong>
        </div>

        <div class="col text-end">

            @foreach ($post->categoryPost as $category_post)
                <span class="badge bg-primary bg-opacity-50">
                    {{ $category_post->category->name }}
                </span>
            @endforeach

        </div>

    </div>
    <a href="" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
    &nbsp;
    <p class="d-inline fw-light">{{$post->description}}</p>
    <p class="text-muted xsmall">{{$post->created_at->diffForHumans()}}</p>
   @include('users.post.contents.comment')
</div>
