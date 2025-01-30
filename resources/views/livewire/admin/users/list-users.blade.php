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
                <h4 class="page-title">Users</h4>
                <button class="btn btn-primary" wire:click.prevent='addNewUser'>Add New User</button>
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
                                            <th>Email</th>
                                            <th>Photo</th>
                                            <th>Status </th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>July 24, 1950</td>
                                                <td>
                                                    <!-- Switch-->
                                                    <div>
                                                        <input type="checkbox" id="switch01" checked
                                                            data-switch="success" />
                                                        <label for="switch01" data-on-label="Yes" data-off-label="No"
                                                            class="mb-0 d-block"></label>
                                                    </div>
                                                </td>
                                                <td class="table-action">
                                                    <a href="" wire:click.prevent="edit( {{ $user }} )"
                                                        class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                    <a href="javascript: void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ $showEditModal ? 'Edit User' : 'Add New User' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name :</label>
                            <input type="text" wire:model.defer="state.name"
                                class="form-control @error('name') is-invalid @enderror" id="recipient-name">
                            @error('name')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="text" wire:model.defer="state.email"
                                class="form-control @error('email') is-invalid @enderror" id="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                        <div class="mb-3" style="display: {{ $showEditModal ? 'none' : '' }};">
                            <label for="password" class="col-form-label">Password :</label>
                            <input type="password" wire:model.defer="state.password"
                                class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                        <div class="mb-3" style="display: {{ $showEditModal ? 'none' : '' }};">
                            <label for="password_confirmation" class="col-form-label">C-Password :</label>
                            <input type="password" wire:model.defer="state.password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation">
                            @error('password_confirmation')
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

</div>
