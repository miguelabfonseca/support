<x-tenant-layout title="_('Edit Customer') '{!! $customer->name !!}'" :themeAction="$themeAction">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('Customers') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('Create') }}</a></li>
            </ol>
        </div>
        <div class="default-tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" data-toggle="tab" href="#profile"><i class="la la-phone mr-2"></i> Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" data-toggle="tab" href="#contact"><i class="flaticon-381-notepad mr-2"></i> Services</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <div class="pt-4">
                        <x-tenant.customers.form :action="route('tenant.customers.update', $customer->id)" :districts="$districts" :counties="$counties" :name="$customer->name" :vat="$customer->vat" :email="$customer->email" :phone="$customer->contact" :address="$customer->address" :zipcode="$customer->zipcode" :district="$customer->district" :county="$customer->county" :update="true" buttonAction="{{ __('Update Customer') }}" formTitle="{{ __('Update Customer') }}"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile">
                    <div class="pt-4">

                    </div>
                </div>
                <div class="tab-pane fade" id="contact">
                    <div class="pt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="erros">
        @if ($errors->any())
            <script>
                let status = '';
                let message = '';

                status = 'error';
                @php
                    $message = __('All fields are mandatory!');
                @endphp
                message = '{!! $message !!}';
            </script>
        @endif
    </div>
</x-tenant-layout>
