<x-tenant-layout title="{{ __('Edit Brand') }} '{!! $brand->name !!}'" :themeAction="$themeAction">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Setup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Device Brands') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit') }}</a></li>
            </ol>
        </div>
        <x-tenant.setup.brands.form :action="route('tenant.setup.brands.update', $brand->id)" :name="$brand->name" :image="$brand->image" :update="true" buttonAction="Update brand" formTitle="{{ __('Update Brand') }}"/>
    </div>
</x-tenant-layout>
