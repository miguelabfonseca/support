<?php

namespace App\Http\Livewire\Tenant\Setup\Brands;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\Brands;

class ShowBrands extends Component
{
    use WithPagination;

    private object $brands;
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
        return 'tenant.livewire.setup.brands.pagination-brands';
    }

    public function functeste()
    {
        return view('tenant.livewire.setup.brands.show-brands', [
            'brands' => Brands::paginate($this->perPage)
        ]);
    }

    public function render()
    {
        $this->brands = Brands::paginate($this->perPage);
        //$this->dispatchBrowserEvent('loading.remove');
        return view('tenant.livewire.setup.brands.show-brands', [
            'brands' => $this->brands
        ]);
    }
}
