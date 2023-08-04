<div class="modal" id="delete-post-{{ $post->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ $post->image }}" class="img-thumbnail" alt="">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
