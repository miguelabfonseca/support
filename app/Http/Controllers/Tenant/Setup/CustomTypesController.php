<?php

namespace App\Http\Controllers\Tenant\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Setup\CustomTypes\CustomTypesFormRequest;
use App\Repositories\Tenant\Setup\CustomTypes\CustomTypesRepository;
use Illuminate\Http\Request;
use App\Models\Tenant\CustomTypes;
use Illuminate\Contracts\View\View;


class CustomTypesController extends Controller
{
    public function __construct(private CustomTypesRepository $repository)
    {

    }

      /**
     * Display the services list.

     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('tenant.setup.customtypes.index', [
            'themeAction' => 'table_datatable_basic',
            'status' => session('status'),
            'message' => session('message'),
        ]);
    }

     * Create brand.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request): View
    {
        $themeAction = 'form_element';
        return view('tenant.setup.customtypes.create', compact('themeAction'));
    }

    public function edit(CustomTypes $customType): View
    {
        $themeAction = 'form_element';
        return view('tenant.setup.customtypes.edit', compact('customType', 'themeAction'));
    }

    public function store(CustomTypes $customType, CustomTypesFormRequest $request)
    {
        $customType = CustomTypes::create([
            'description' => $request->description,
            'controller' => $request->controller,
            'field_name' => $request->field_name,
        ]);

        return to_route('tenant.setup.custom-types.index')
            ->with('message', __('Custom type created with success!'))
            ->with('status', 'sucess');
    }

    public function update(CustomTypes $customType, CustomTypesFormRequest $request)
    {
        $customType->fill($request->all());
        $customType->save();

        return to_route('tenant.setup.custom-types.index')
            ->with('message', __('Custom type updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(CustomTypes $customType)
    {
        $customType->delete();
        return to_route('tenant.setup.custom-types.index')
            ->with('message', __('Custom type deleted with success!'))
            ->with('status', 'sucess');
    }

}
