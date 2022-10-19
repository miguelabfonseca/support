<?php

namespace App\Http\Livewire\Tenant\Customerlocations;

use App\Models\Counties;
use App\Models\Districts;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

use App\Models\Tenant\CustomerServices;
use App\Models\Tenant\Services;
use App\Models\Tenant\Customers;

class AddCustomerlocations extends Component
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
    public string $start_date = '';
    public string $end_date = '';
    public string $type = '';

    public string $homePanel = 'show active';
    public string $locationPanel = '';
    public string $profile = '';

    public object $districts;
    public string $district = '';

    public object $counties;
    public string $county = '';

    protected array $rules = [
        'selectedCustomer' => 'required|min:1',
        'selectedService' => 'required|min:1',
    ];

    public function mount($customerList): void
    {
        $this->customerList = $customerList;
        $this->districts = tenancy()->central(function () {
            return Districts::all();
        });
        $this->counties = tenancy()->central(function () {
            return Counties::all();
        });
        // $this->serviceList = $serviceList;

        if (isset($this->perPage)) {
            session()->put('perPage', $this->perPage);
        } elseif (session('perPage')) {
            $this->perPage = session('perPage');
        } else {
            $this->perPage = 10;
        }
    }

    // public function updatedPerPage(): void
    // {
    //     $this->resetPage();
    //     session()->put('perPage', $this->perPage);
    // }

    // public function updatedSearchString(): void
    // {
    //     $this->resetPage();
    // }

    // public function paginationView()
    // {
    //     return 'tenant.livewire.setup.pagination';
    // }

    public function updatedSelectedCustomer()
    {
        $this->customer = Customers::where('id', $this->selectedCustomer)->first();
        $this->homePanel = 'show active';
        $this->locationPanel = '';
        $this->profile = '';
        //$this->dispatchBrowserEvent('contentChanged');
    }

    public function updatedSelectedService()
    {
        $this->service = Services::where('id', $this->selectedService)->first();
        $this->homePanel = '';
        $this->locationPanel = 'show active';
        $this->profile = '';
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function updatedStartDate()
    {
        //$this->dispatchBrowserEvent('contentChanged2');
    }

    public function updatedEndDate()
    {
        //$this->dispatchBrowserEvent('contentChanged2');
    }

    public function save(CustomerServices $CustomerServices)
    {
        $validator = Validator::make(
            [
                'selectedCustomer'  => $this->selectedCustomer,
                'selectedService' => $this->selectedService,
            ],
            [
                'selectedCustomer'  => 'required|min:1',
                'selectedService' => 'required|min:1',
            ],
            [
                'selectedCustomer'  => __('You must select the customer!'),
                'selectedService' => __('You must select the service!'),
            ]
        );

        if ($validator->fails()) {
            $errorMessage = '';
            foreach($validator->errors()->all() as $message) {
                $errorMessage .= '<p>' . $message . '</p>';
            }
            $this->dispatchBrowserEvent('swal', ['title' => __('Services'), 'message' => $errorMessage, 'status'=>'error']);
        } else {
            $start_date = '1970/01/01';
            $end_date = '1970/01/01';
            if($this->start_date) {
                $start_date = $this->start_date;
            }
            if($this->end_date) {
                $end_date = $this->end_date;
            }
            $CustomerServices->fill([
                'customer_id' => $this->selectedCustomer,
                'service_id' => $this->selectedService,
                'location_id' => 0,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'type' => $this->type,
                'last_date' => '1970/01/01'
            ]);
            $CustomerServices->save();
            return redirect()->route('tenant.services.index')
                ->with('message', __('Service created with success!'))
                ->with('status', 'sucess');
        }

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

        return view('tenant.livewire.customerlocations.add', [
            'customerServices' => $this->customerServices,
            'customerList' => $this->customerList,
            'customer' => $this->customer,
            'service' => $this->service,
            'selectedCustomer' => $this->selectedCustomer,
            'selectedService' => $this->selectedService,
            'homePanel' => $this->homePanel,
            'locationPanel' => $this->locationPanel,
            'profile' => $this->profile,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => $this->type,
            'districts' => $this->districts,
            'district' => $this->district,
            'counties' => $this->counties,
            'county' => $this->county,
        ]);
    }

}
