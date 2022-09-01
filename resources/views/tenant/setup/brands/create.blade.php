<x-tenant-layout title="Nova Série" :themeAction="$themeAction">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Setup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Device Brands') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Create') }}</a></li>
            </ol>
        </div>
        <!-- row -->
        <x-tenant.setup.brands.form :action="route('tenant.setup.brands.store')" :update="false" buttonAction="Create" formTitle="{{ __('Create Brand') }}"/>
    </div>
</x-tenant-layout>
