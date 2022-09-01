<x-tenant-layout title="{{ __('List Brands') }}" :themeAction="$themeAction" :status="$status" :message="$message">
{{-- Content --}}
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Setup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Device Brands') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('List') }}</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Brands') }}</h4>
                    </div>
                    <div class="card-body">
                        @livewire('tenant.setup.brands.show-brands')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-layout>


