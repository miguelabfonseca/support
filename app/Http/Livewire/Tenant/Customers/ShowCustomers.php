<?php

namespace App\Http\Livewire\Tenant\Customers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\Customers;
use Illuminate\Contracts\View\View;

class ShowCustomers extends Component
{
    use WithPagination;

    private object $customers;
    public int $perPage;
    public string $searchString = '';

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

    public function render(): View
    {
        if(isset($this->searchString) && $this->searchString) {
            $this->customers = Customers::where('name', 'like', '%' . $this->searchString . '%')->paginate($this->perPage);
        } else {
            $this->customers = Customers::paginate($this->perPage);
        }
        return view('tenant.livewire.customers.show-customers', [
            'customers' => $this->customers
        ]);
    }
}
