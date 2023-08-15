<hr>

<div class="mt-3">
    @if ($post->comments->isNotEmpty())
        <ul class="list-group">
            @foreach ($post->comments->take(3) as $comment)
                <li class="list-group-item border-0 mb-2">
                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $comment->body }}</p>
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                        @if ($comment->user->id == Auth::user()->id)
                            &middot;
                            <button type="submit" class="border-0 btn text-danger p-0 xsmall">Delete</button>
                        @endif
                    </form>
                </li>
            @endforeach
            @if ( $post->comments->count() > 3)
            <li class="list-group-item border-0 mb-2">
                <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none">
                    View all ({{$post->comments->count()}}) comments</a>
            </li>
            @endif
        </ul>
    @endif


<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <div class="input-group">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="body" id="" cols="" rows="1" class="form-control" placeholder="Add a comment"></textarea>
        <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa-regular fa-paper-plane"></i></button>
    </div>
</form>
</div>


