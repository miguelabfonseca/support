<?php

namespace App\Http\Livewire\Tenant\Setup\Brands;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\Brands;
use Illuminate\Contracts\View\View;

class ShowBrands extends Component
{
    use WithPagination;

    private object $brands;
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
            $this->brands = Brands::where('name', 'like', '%' . $this->searchString . '%')->paginate($this->perPage);
        } else {
            $this->brands = Brands::paginate($this->perPage);
        }
        return view('tenant.livewire.setup.brands.show-brands', [
            'brands' => $this->brands, 'aa' => $this->page
        ]);
    }
}
