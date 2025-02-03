<div class="col-sm-6">

        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <select wire:change="getProductsCount($event.target.value)" class="form-control">
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Products</h5>
                <h3 class="mt-3 mb-3" style=" height: 30px;">
                    <div wire:loading.remove>{{ $productsCount }}</div>
                    <div wire:loading.delay><x-animations.ballbeat /></div>
                </h3>
                <p class="mb-0 text-muted">
                    <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

</div>
