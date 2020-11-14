

<div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>