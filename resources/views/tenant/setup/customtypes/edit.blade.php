<x-tenant-layout title="{{ __('Edit Custom Type') }} '{!! $customType->description !!}'" :themeAction="$themeAction">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Setup') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Custom Types') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Edit') }}</a></li>
            </ol>
        </div>
        <x-tenant.setup.customtypes.form :action="route('tenant.setup.custom-types.update', $customType->id)" :description="$customType->description" :controller="$customType->controller" :fieldname="$customType->field_name" :update="true" buttonAction="{{ __('Update') }}" formTitle="{{ __('Update Custom Type') }}"/>
    </div>
</x-tenant-layout>
