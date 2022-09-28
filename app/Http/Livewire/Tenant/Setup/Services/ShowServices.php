<?php

namespace App\Http\Livewire\Tenant\Setup\Services;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\Services;

class ShowServices extends Component
{
    use WithPagination;

    private object $services;
    public int $perPage;

    public function mount()
    {
        if (isset($this->perPage)) {
            session()->put('perPage', $this->perPage);
        } elseif (session('perPage')) {
            $this->perPage = session('perPage');
        } else {
            $this->perPage = 10;
        }
    }

    public function changePerPage($page)
    {
        $this->resetPage();
        $this->perPage = $page;
        session()->put('perPage', $this->perPage);
    }
    /**
     * Default pagination view
     * @return [type]
     */
    public function paginationView()
    {
        return 'tenant.livewire.setup.services.pagination-services';
    }

    public function functeste()
    {
        return view('tenant.livewire.setup.services.show-services', [
            'services' => Services::paginate($this->perPage)
        ]);
    }

    public function render()
    {
        $this->services = Services::paginate($this->perPage);
        //$this->dispatchBrowserEvent('loading.remove');
        return view('tenant.livewire.setup.services.show-services', [
            'services' => $this->services
        ]);
    }
}
