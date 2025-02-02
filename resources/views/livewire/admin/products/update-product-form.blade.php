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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Input Types</h4>


                    <div class="tab-content">
                        <div id="input-types-preview">

                            <form wire:submit.prevent="updateProduct" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Categories</label>
                                            <select wire:model.defar="state.category_id" class="form-control"
                                                id="category_id">
                                                <option value="">-- Select Category -- </option>
                                                @foreach ($categories as $index => $value)
                                                    <option value="{{ $index }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input wire:model.defar="state.name" type="text" id="name"
                                                class="form-control">
                                            @error('name')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>





                                    </div> <!-- end col -->

                                    <div class="col-lg-6">


                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input wire:model.defar="state.price" type="number" id="price"
                                                class="form-control">
                                            @error('price')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">


                                            <label for="photo" class="form-label">photo</label>
                                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                <input wire:model.live="photo" class="form-control" type="file" class="custom-file-input"
                                                    id="customFile">
                                                <div x-show.transition="isUploading"
                                                    class="progress bg-success mt-2 rounded">
                                                    <div class="progress-bar bg-success progress-bar-striped"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" height="500"  x-bind:style="`width: ${progress}%`">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                            </div>


                                            @error('photo')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                            <p>
                                            <div wire:loading wire:target="photo">Uploading...</div>
                                            </p>
                                            <p>
                                                @if ($photo)
                                                    <img src="{{ $photo->temporaryUrl() }}" width="100">
                                                @else
                                                    <img  src="{{ Storage::disk('photos')->url($state['photo']) }}"
                                                        width="100">
                                                @endif

                                            </p>
                                        </div>



                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button id="submit" wire:loading.attr='disabled' wire:target="photo"
                                            type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                            Save</button>
                                    </div>
                                </div>
                                <!-- end row-->
                            </form>


                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

</div>
