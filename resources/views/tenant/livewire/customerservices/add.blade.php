<x-tenant.customerservices.form :action="route('tenant.setup.brands.store')" :update="false"
:customerList="$customerList" :serviceList="$serviceList" :selectedCustomer="$selectedCustomer" :selectedService="$selectedService" :customer="$customer" :service="$service"
:homePanel="$homePanel" :servicesPanel="$servicesPanel" :profile="$profile" buttonAction="{{ __('Create') }}" formTitle="{{ __('Create Service') }}" />
