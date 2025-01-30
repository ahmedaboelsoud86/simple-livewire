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
                <h4 class="page-title">Categories</h4>
                <button class="btn btn-primary" wire:click.prevent='addNewCategory'>Add New Category</button>
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
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="table-action">
                                                    <a href="" wire:click.prevent="edit( {{ $category }} )"
                                                        class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                    <a href=""
                                                        wire:click.prevent="confirmCategoryRemoval({{ $category->id }})"
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
                    {{ $categories->links() }}
                </div>

            </div> <!-- end card -->

        </div><!-- end col-->


    </div>
    <!-- end row-->



    <!-- Modal -->
    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $showEditModal ? 'Edit Category' : 'Add New Category' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateCategory' : 'createCategory' }}">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name :</label>
                            <input type="text" wire:model.defer="state.name"
                                class="form-control @error('name') is-invalid @enderror" id="recipient-name">
                            @error('name')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->


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
