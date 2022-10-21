<x-tenant-layout title="{{ __('Edit Service') }} '{!! $service->name !!}'" :themeAction="$themeAction">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Setup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Services') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit') }}</a></li>
            </ol>
        </div>
        <x-tenant.setup.services.form :action="route('tenant.setup.services.update', $service->id)" :typeList="$typeList" :paymentList="$paymentList" :name="$service->name" :description="$service->description" :type="$service->type" :payment="$service->payment" :update="true" buttonAction="Update service" formTitle="{{ __('Update Service') }}"/>
    </div>
</x-tenant-layout>
