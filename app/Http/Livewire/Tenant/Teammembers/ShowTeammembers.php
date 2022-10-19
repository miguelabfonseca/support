<?php

namespace App\Http\Livewire\Tenant\Teammembers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tenant\TeamMember;
use Illuminate\Contracts\View\View;

class ShowTeammembers extends Component
{
    use WithPagination;

    private object $teamMembers;
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
            $this->teamMembers = TeamMember::where('name', 'like', '%' . $this->searchString . '%')->paginate($this->perPage);
        } else {
            $this->teamMembers = TeamMember::paginate($this->perPage);
        }
        return view('tenant.livewire.teammembers.show-teammembers', [
            'teamMembers' => $this->teamMembers
        ]);
    }
}
