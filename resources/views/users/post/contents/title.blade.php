<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-auto">
            @if ($post->user->avatar)
                <img src="{{ $post->user->avatar }}" class="rounded-circle avatar-sm" alt="">
            @else
                <i class="fa-solid fa-circle-user icon-sm"></i>
            @endif
        </div>
        <div class="col ps-0">
            <a href="#" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>

                @if ($post->user->id === Auth::user()->id)
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-post-{{ $post->id }}">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </div>
                @else
                @endif

            </div>
            @include('users.post.contents.modals.delete')
        </div>
    </div>
</div>
