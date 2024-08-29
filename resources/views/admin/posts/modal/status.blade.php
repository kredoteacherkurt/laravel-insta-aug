<div class="modal fade" id="deactivate-post-{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content boder-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                    Deactivate Post <i class="fa-solid fa-eye-slash"></i>
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <img src="{{$post->image}}" alt="" class="img-thumbnail avatar-md">
                    <p class="text-muted d-inline">Are you sure to hide post # <span
                            class="fw-bold">{{ $post->id }}</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.posts.hide',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                </form>

            </div>
        </div>
    </div>
</div>


{{-- activate --}}

<div class="modal fade" id="activate-post-{{ $post->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content boder-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success" id="modalTitleId">
                    Activate post <i class="fa-solid fa-eye"></i>
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="text-muted d-inline">Are you sure to activate id # <span
                            class="fw-bold">{{ $post->id }}</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.posts.unhide',$post->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">Unhide</button>
                </form>

            </div>
        </div>
    </div>
</div>
