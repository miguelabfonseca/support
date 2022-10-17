<?php

namespace App\Http\Livewire\Tenant\Customerservices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\Services;
use App\Models\Tenant\Customers;
use Illuminate\Contracts\View\View;
use App\Models\Tenant\CustomerServices;

class ShowCustomerServices extends Component
{
    use WithPagination;

    private object $customerServices;
    public int $perPage;
    public string $searchString = '';
    public string $userAction = '';

    public function mount(): void
    {
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

    public function addCustomerService()
    {
        $this->userAction = 'add';
    }

    public function render(): View
    {
        if($this->userAction == 'add') {
            return view('tenant.livewire.customerservices.add', [
                'customers' => Customers::all(),
                'services' => Services::all()
            ]);
        }

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
        return view('tenant.livewire.customerservices.show', [
            'customerServices' => $this->customerServices
        ]);
    }
}
