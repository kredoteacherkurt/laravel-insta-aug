<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content boder-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                    Deactivate User <i class="fa-solid fa-user-slash"></i>
                </h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    @if ($user->avatar)
                        <img src="{{$user->avatar}}" alt="" class="rounded-circle avatar-sm">
                    @else
                        <i class="fa-solid fa-circle-user icon-sm"></i>
                    @endif
                    <p class="text-muted d-inline">Are you sure to deactivate <span class="fw-bold">{{ $user->name }}</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
