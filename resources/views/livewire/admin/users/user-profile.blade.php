<div>
<style>
    .image-profile{
        border: 2px salmon solid;
        cursor: pointer;
    }

    .image-profile:hover{
        border: 2px rgb(163, 46, 32) solid;
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
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-12">
                <div class="card-body text-center">

                    <div x-data="{ imagePreview: '{{ Storage::disk('photos')->url(auth()->user()->photo) }}' }">
                     <input wire:model='image' class="d-none" type="file" x-ref="image"
                     x-on:change="
                      const reader = new FileReader();
                      reader.onload = (event) => {
                        imagePreview = event.target.result;
                      };
                      reader.readAsDataURL($refs.image.files[0]);
                     "
                     />
                    <img  x-on:click="$refs.image.click()" x-bind:src="imagePreview ? imagePreview : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' " alt="avatar"
                        class="rounded-circle img-fluid image-profile" style="width: 150px;">


                    </div>
                    <h5 class="my-3">John Smith</h5>
                    <p class="text-muted mb-1">Full Stack Developer</p>
                    <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary">Follow</button>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-outline-primary ms-1">Message</button>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>
