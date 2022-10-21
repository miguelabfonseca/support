<?php

namespace App\Http\Controllers\Tenant\CustomerServices;

use App\Models\Counties;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Tenant\Services;
use App\Models\Tenant\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Tenant\CustomerServices;
use App\Http\Requests\Tenant\Customers\CustomersFormRequest;


class CustomerServicesController extends Controller
{

    // public function __construct(private BrandsRepository $repository)
    // {

    // }
    /**
     * Display the customers list.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tenant.customerservices.index', [
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
    public function create(Request $request): View
    {
        return view('tenant.customerservices.create', [
            'themeAction' => 'form_element',
            'customerList' => Customers::all(),
            'serviceList' => Services::all(),
            'selectedCustomer' => '',
            'selectedService' => '',
            'customer' => '',
        ]);
    }

    public function edit(CustomerServices $service): View
    {
        $customer = Customers::where('id', $service->customer_id)->first();
        $districts = tenancy()->central(function () {
            return Districts::all();
        });
        $counties = tenancy()->central(function () use ($customer) {
            return Counties::where('district_id', $customer->district)->get();
        });
        $themeAction = 'form_element';
        return view('tenant.customers.edit', compact('service', 'customer', 'themeAction', 'districts', 'counties'));
    }

    public function store(Customers $customers, CustomersFormRequest $request): RedirectResponse
    {
        $customers = Customers::create([
            'name' => $request->name,
            'vat' => $request->vat,
            'contact' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'district' => $request->district,
            'county' => $request->county,
            'zipcode' => $request->zipcode,
        ]);

        return to_route('tenant.customers.index')
            ->with('message', __('Customer created with success!'))
            ->with('status', 'sucess');
    }

    public function update(Customers $customers, CustomersFormRequest $request): RedirectResponse
    {
        $customers->fill($request->all());
        $customers->save();

        return to_route('tenant.customers.index')
            ->with('message', __('Customer updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(Customers $brand): RedirectResponse
    {
        $brand->delete();
        return to_route('tenant.customers.index')
            ->with('message', __('Brand deleted with success!'))
            ->with('status', 'sucess');
    }

}
