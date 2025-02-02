<div>
    <style>
        .opacity {
            opacity: 0.5;
        }

        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>
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
                <a href="{{ route('create.product') }}" class="btn btn-primary">Add New Product</a>
                @if ($checkProduct)
                    <button class="btn btn-danger" wire:click='deleteProducts()'>Selected ( {{ count($checkProduct) }} )
                    </button>
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="input-group mb-2">
                <input type="text" wire:model.live.debounce500ms='seaechItem' placeholder="Search ... "
                    class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-2">
                <select class="form-control" wire:model.change='limteItem'>
                    <option value="5"> 5 </option>
                    <option selected value="15"> 15 </option>
                    <option value="20"> 20 </option>
                    <option value="100"> 100 </option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-2">
                <select class="form-control" wire:model.change='categories'>
                    <option value=""> -- All -- </option>
                    @foreach ($cats as $index => $value)
                        <option value="{{ $index }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>





    </div>
    <div class="row mt-2" wire:loading>
        <div id="loader"></div>
    </div>

    <div class="row mt-2" wire:loading.class='opacity'>
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
                                            <th><input type="checkbox" wire:model.live="selectAll"></th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><input type="checkbox" value="{{ $item->id }}"
                                                        wire:model.live.defar="checkProduct"></td>
                                                <td><img src="{{  Storage::disk('photos')->url($item->photo) }}" width="100"></td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td class="table-action">
                                                    <a href="{{ route('edit.product', $item) }}" class="action-icon"> <i
                                                            class="mdi mdi-pencil"></i> </a>
                                                    <a href=""
                                                        wire:click.prevent="confirmCategoryRemoval({{ $item->id }})"
                                                        class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="6">
                                                    No Resulat Found
                                                </td>
                                            </tr>
                                        @endforelse
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


    <x-confirmation-alert />


</div>
