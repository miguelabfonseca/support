<x-tenant.tasks.form :action="route('tenant.tasks.store')" :update="false"
:customerList="$customerList" :serviceList="$serviceList" :selectedCustomer="$selectedCustomer" :selectedService="$selectedService" :customer="$customer" :service="$service"
:homePanel="$homePanel" :servicesPanel="$servicesPanel" :profile="$profile" :start_date="$start_date" :end_date="$end_date" :type="$type" :locations="$locations" buttonAction="{{ __('Create') }}" formTitle="{{ __('Create Task') }}" />

