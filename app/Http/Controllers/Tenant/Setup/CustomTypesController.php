<?php

namespace App\Http\Controllers\Tenant\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Setup\Brands\BrandsFormRequest;
use App\Repositories\Tenant\Setup\Brands\BrandsRepository;
use Illuminate\Http\Request;

use App\Models\Tenant\Brands;

class CustomTypesController extends Controller
{

    public function __construct(private BrandsRepository $repository)
    {

    }
    /**
     * Display the brands list.
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

    /**
     * Create brand.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $themeAction = 'form_element';
        return view('tenant.setup.customtypes.create', compact('themeAction'));
    }

    public function edit(Brands $brand)
    {
        $themeAction = 'form_element';
        return view('tenant.setup.customtypes.edit', compact('brand', 'themeAction'));
    }

    public function store(Brands $brands, BrandsFormRequest $request)
    {
        $brand = Brands::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);

        return to_route('tenant.setup.customtypes.index')
            ->with('message', __('Brand created with success!'))
            ->with('status', 'sucess');
    }

    public function update(Brands $brand, BrandsFormRequest $request)
    {
        #$request->file('file')->store(storage_path() . '/setup/brands');

        $brand->fill($request->all());
        $brand->save();

        return to_route('tenant.setup.customtypes.index')
            ->with('message', __('Brand updated with success!'))
            ->with('status', 'sucess');
    }

    public function destroy(Brands $brand)
    {
        $brand->delete();
        return to_route('tenant.setup.customtypes.index')
            ->with('message', __('Brand deleted with success!'))
            ->with('status', 'sucess');
    }

}
