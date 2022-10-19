<x-tenant-layout title="{{ __('List Customer Locations') }}" :themeAction="$themeAction" :status="$status" :message="$message">
    {{-- Content --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Customer Locations') }}</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('List') }}</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-3 text-right">
                <a href="{{ route('tenant.customer-locations.create') }}" class="btn btn-primary">{{ __('Create Customer Location') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Customer Locations') }}</h4>
                    </div>
                    <div class="card-body">
                        @livewire('tenant.customerlocations.show-customerlocations')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tenant-layout>
