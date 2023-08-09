<div class="mt-3">
    {{-- show all comments --}}

    <form action="{{route('comment.store')}}" method="post">
        @csrf
        <div class="input-group">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <textarea name="body" id=""  rows="1" class="form-control" placeholder="Add a comment"></textarea>
            <button type="submit" class="btn btn-secondary"><i class="fa-regular fa-paper-plane"></i></button>
        </div>
    </form>
</div>
