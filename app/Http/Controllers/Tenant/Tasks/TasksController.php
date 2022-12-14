<?php

namespace App\Http\Controllers\Tenant\Tasks;

use App\Models\Counties;
use App\Models\Districts;
use Illuminate\Http\Request;
use App\Models\Tenant\Services;
use App\Models\Tenant\Customers;
use App\Http\Controllers\Controller;
use App\Models\Tenant\CustomerServices;
use App\Http\Requests\Tenant\Customers\CustomersFormRequest;

class TasksController extends Controller
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
        return view('tenant.tasks.index', [
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
        return view('tenant.tasks.create', [
            'themeAction' => 'form_element',
            'customerList' => Customers::all(),
            'serviceList' => CustomerServices::where('customer_id', 0)->with('service')->get(),
            'selectedCustomer' => '',
            'selectedService' => '',
            'customer' => '',
        ]);
    }

    public function edit(Customers $customer)
    {
        $districts = tenancy()->central(function () {
            return Districts::all();
        });
        $counties = tenancy()->central(function () use ($customer) {
            return Counties::where('district_id', $customer->district)->get();
        });
        $themeAction = 'form_element';
        return view('tenant.customers.edit', compact('customer', 'themeAction', 'districts', 'counties'));
    }

    public function store(Customers $customers, CustomersFormRequest $request)
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

    public function update(Customers $customers, CustomersFormRequest $request)
    {
        $customers->fill($request->all());
        $customers->save();

        return to_route('tenant.customers.index')
            ->with('message', __('Customer updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(Customers $brand)
    {
        $brand->delete();
        return to_route('tenant.customers.index')
            ->with('message', __('Brand deleted with success!'))
            ->with('status', 'sucess');
    }

}
