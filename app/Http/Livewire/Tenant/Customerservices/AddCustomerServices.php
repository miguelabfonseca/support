<?php

namespace App\Http\Livewire\Tenant\Customerservices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\CustomerServices;

use App\Models\Tenant\Services;
use App\Models\Tenant\Customers;
use Illuminate\Contracts\View\View;

class AddCustomerServices extends Component
{
    use WithPagination;

    private object $customerServices;
    public int $perPage;
    public string $searchString = '';

    public object $customerList;
    public object $serviceList;
    public string $selectedCustomer = '';
    public string $selectedService = '';
    public $customer = '';
    public $service = '';

    public string $homePanel = 'show active';
    public string $servicesPanel = '';
    public string $profile = '';

    public function mount($customerList, $serviceList): void
    {
        $this->customerList = $customerList;
        $this->serviceList = $serviceList;

        if (isset($this->perPage)) {
            session()->put('perPage', $this->perPage);
        } elseif (session('perPage')) {
            $this->perPage = session('perPage');
        } else {
            $this->perPage = 10;
        }
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
        session()->put('perPage', $this->perPage);
    }

    public function updatedSearchString(): void
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'tenant.livewire.setup.pagination';
    }

    public function updatedSelectedCustomer()
    {
        $this->customer = Customers::where('id', $this->selectedCustomer)->first();
        $this->homePanel = 'show active';
        $this->servicesPanel = '';
        $this->profile = '';
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function updatedSelectedService()
    {
        $this->service = Services::where('id', $this->selectedService)->first();
        $this->homePanel = '';
        $this->servicesPanel = 'show active';
        $this->profile = '';
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function save()
    {
        dd($_POST);
    }

    public function render(): View
    {

        if(isset($this->searchString) && $this->searchString) {
            $this->customerServices = CustomerServices::where('name', 'like', '%' . $this->searchString . '%')
                ->with('customer')
                ->with('service')
                ->paginate($this->perPage);
        } else {
            $this->customerServices = CustomerServices::with('customer')
                ->with('service')
                ->paginate($this->perPage);
        }

        return view('tenant.livewire.customerservices.add', [
            'customerServices' => $this->customerServices,
            'customerList' => $this->customerList,
            'serviceList' => $this->serviceList,
            'customer' => $this->customer,
            'service' => $this->service,
            'selectedCustomer' => $this->selectedCustomer,
            'selectedService' => $this->selectedService,
            'homePanel' => $this->homePanel,
            'servicesPanel' => $this->servicesPanel,
            'profile' => $this->profile,

        ]);
    }
}
