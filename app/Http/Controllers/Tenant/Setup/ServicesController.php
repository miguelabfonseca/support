<?php

namespace App\Http\Controllers\Tenant\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Setup\Services\ServicesFormRequest;
use App\Models\Tenant\CustomTypes;
use App\Repositories\Tenant\Setup\Services\ServicesRepository;
use Illuminate\Http\Request;
use App\Models\Tenant\Services;

class ServicesController extends Controller
{
    public function __construct(private ServicesRepository $repository)
    {

    }

      /**
     * Display the services list.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tenant.setup.services.index', [
            'themeAction' => 'table_datatable_basic',
            'status' => session('status'),
            'message' => session('message'),
            ]);
    }

      /**
     * Create brand.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $typeList = CustomTypes::where('controller','setup.services')
            ->where('field_name', 'type')
            ->get();
        $paymentList = CustomTypes::where('controller','setup.services')
            ->where('field_name', 'payment')
            ->get();
        $themeAction = 'form_element';
        return view('tenant.setup.services.create', compact('themeAction', 'typeList', 'paymentList'));
    }

    public function edit(Services $service)
    {
        $typeList = CustomTypes::where('controller','setup.services')
            ->where('field_name', 'type')
            ->get();
        $paymentList = CustomTypes::where('controller','setup.services')
            ->where('field_name', 'payment')
            ->get();
        $themeAction = 'form_element';
        return view('tenant.setup.services.edit', compact('service', 'themeAction', 'typeList', 'paymentList'));
    }

    public function store(Services $services, ServicesFormRequest $request)
    {

        $service = Services::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'payment' => $request->payment
        ]);

        return to_route('tenant.setup.services.index')
            ->with('message', __('Service created with success!'))
            ->with('status', 'sucess');
    }

    public function update(Services $service, ServicesFormRequest $request)
    {
        $service->fill($request->all());
        $service->save();

        return to_route('tenant.setup.services.index')
            ->with('message', __('Service updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(Services $service)
    {
        $service->delete();
        return to_route('tenant.setup.services.index')
            ->with('message', __('Service deleted with success!'))
            ->with('status', 'sucess');
    }

}
