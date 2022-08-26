<?php

namespace App\Http\Controllers\Tenant\Setup;

use Illuminate\Http\Request;
use App\Models\Tenant\Brands;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Repositories\Tenant\Setup\Brands\BrandsRepository;
use App\Http\Requests\Tenant\Setup\Brands\BrandsFormRequest;

class BrandsController extends Controller
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
        $action = 'table_datatable_basic';
        $brands = Brands::all();
        return view('tenant.setup.brands.index', compact('action', 'brands'));
    }

    /**
     * Create brand.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $action = 'form_element';
        return view('tenant.setup.brands.create', compact('action'));
    }

    public function edit(Brands $brand)
    {
        $action = 'form_element';
        return view('tenant.setup.brands.edit', compact('brand', 'action'));
    }

    public function store(Brands $brands, BrandsFormRequest $request)
    {
        $brand = Brands::create([
            'name' => $request->name,
            'image' => $request->image,
        ]);

        return to_route('tenant.setup.brands.index')
            ->with('mensagem.sucesso', "Série criada com sucesso");
    }

    public function update(Brands $brand, BrandsFormRequest $request)
    {
        $brand->fill($request->all());
        $brand->save();
        return to_route('tenant.setup.brands.index')
            ->with('mensagem.sucesso', "Série '{$brand->name}' atualizada com sucesso");
    }
}

// "tenant.setup.devices.list" => Illuminate\Routing\Route {#413 ▶}
// "tenant.setup.brands.brands.index" => Illuminate\Routing\Route {#1196 ▶}
// "tenant.setup.brands.brands.create" => Illuminate\Routing\Route {#1129 ▶}
// "tenant.setup.brands.brands.store" => Illuminate\Routing\Route {#1131 ▶}
// "tenant.setup.brands.brands.show" => Illuminate\Routing\Route {#1130 ▶}
// "tenant.setup.brands.brands.edit" => Illuminate\Routing\Route {#732 ▶}
// "tenant.setup.brands.brands.update" => Illuminate\Routing\Route {#1092 ▶}
// "tenant.setup.brands.brands.destroy" => Illuminate\Routing\Route {#1339 ▶}
