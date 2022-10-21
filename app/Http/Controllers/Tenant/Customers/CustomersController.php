<?php

namespace App\Http\Controllers\Tenant\Customers;

use App\Models\Counties;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Tenant\Customers;
use App\Http\Controllers\Controller;
use App\Repositories\Tenant\Customers\CustomersRepository;
use App\Http\Requests\Tenant\Customers\CustomersFormRequest;

class CustomersController extends Controller
{

    private CustomersRepository $customersRepository;

    public function __construct(CustomersRepository $customersRepository)
    {
        $this->customersRepository = $customersRepository;
    }
    /**
     * Display the customers list.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tenant.customers.index', [
            'themeAction' => 'table_datatable_basic',
            'status' => session('status'),
            'message' => session('message'),
        ]);
    }

    /**
     * Create ustomer.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $districts  = tenancy()->central(function () {
            return Districts::all();
        });
        $counties = [];
        $district = '';
        $county = '';
        $themeAction = 'form_element';
        return view('tenant.customers.create', compact('themeAction', 'districts', 'counties', 'district', 'county'));
    }

    public function edit(Customers $customer)
    {
        $districts  = tenancy()->central(function () {
            return Districts::all();
        });
        $counties  = tenancy()->central(function () use ($customer) {
            return Counties::where('district_id', $customer->district)->get();
        });
        $themeAction = 'form_element';
        return view('tenant.customers.edit', compact('customer', 'themeAction', 'districts', 'counties'));
    }

    public function store(Customers $customer, CustomersFormRequest $request)
    {
        $this->customersRepository->add($request);
        // $customer = Customers::create([
        //     'name' => $request->name,
        //     'vat' => $request->vat,
        //     'contact' => $request->contact,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'district' => $request->district,
        //     'county' => $request->county,
        //     'zipcode' => $request->zipcode,
        // ]);

        return to_route('tenant.customers.index')
            ->with('message', __('Customer created with success!'))
            ->with('status', 'sucess');
    }

    public function update(Customers $customer, CustomersFormRequest $request)
    {
        $customer->fill($request->all());
        $customer->save();

        return to_route('tenant.customers.index')
            ->with('message', __('Customer updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(Customers $customer)
    {
        $customer->delete();
        return to_route('tenant.customers.index')
            ->with('message', __('Customer deleted with success!'))
            ->with('status', 'sucess');
    }

}
