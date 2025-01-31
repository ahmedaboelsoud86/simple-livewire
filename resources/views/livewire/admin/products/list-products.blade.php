<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>
                <h4 class="page-title">Products</h4>
                <a href="{{ route('create.product') }}" class="btn btn-primary" >Add New Product</a>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-example-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td class="table-action">
                                                    <a href="" wire:click.prevent="edit( {{ $item }} )"
                                                        class="action-icon"> <i class="mdi mdi-pencil"></i> </a>
                                                    <a href=""
                                                        wire:click.prevent="confirmCategoryRemoval({{ $item->id }})"
                                                        class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end table-responsive-->

                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
                <div class="card-footer">
                    {{ $products->links() }}
                </div>

            </div> <!-- end card -->

        </div><!-- end col-->


    </div>
    <!-- end row-->




    <!-- DeleteModel-->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Category</h5>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete this category ?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" wire:click.prevent="deleteCategory" class="btn btn-danger"><i
                            class="fa fa-trash mr-1"></i>Delete Category</button>
                </div>
            </div>
        </div>
    </div>
    <!--End DeleteModel-->

</div>
