{{-- Edit Modal --}}
<div class="modal" id="edit-category-{{ $category->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border border-warning">
            <div class="modal-header">
                <h5 class="modal-title text-warning"><i class="fa-solid fa-pen-to-square"></i> Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    <div class="text-end mt-3">
                        <button type="button" class="btn btn-sm btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Delte Modal --}}
<div class="modal" id="delete-category-{{ $category->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content  border border-danger">
            <div class="modal-header">
                <h5 class="modal-title text-danger"><i class="fa-solid fa-trash-can"></i> Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete{{ $category->name }} category?</p>

                <p>This action will afffect all the posts under this category. Posts without a category will fall under Uncategorized.</p>

                <div class="text-end">
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>

                
            </div>
        </div>
    </div>
</div>