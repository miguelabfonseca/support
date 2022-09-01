<div class="table-responsive" wire:key="tenantsetupbrandsshowbrands">
    <div wire:loading.flex class="swal2-popup swal2-modal swal2-show" style="border:solid 1px red;z-index:999">

        Processing Payment...

    </div>
    <div id="example_wrapper" class="dataTables_wrapper">
        <div class="dataTables_length" id="example_length">
            <label>Show
                <select name="example_length" aria-controls="example" class="">
                    <option value="10" wire:click="changePerPage(10)"
                        @if ($perPage == 10) selected @endif>10</option>
                    <option value="25" wire:click="changePerPage(25)"
                        @if ($perPage == 25) selected @endif>25</option>
                    <option value="50" wire:click="changePerPage(50)"
                        @if ($perPage == 50) selected @endif>50</option>
                    <option value="100" wire:click="changePerPage(100)"
                        @if ($perPage == 100) selected @endif>100</option>
                </select>
                entries</label>
        </div>
        <div id="example_filter" class="dataTables_filter">
            <label>Search:
                <input type="search" class="" placeholder="" aria-controls="example"></label>
        </div>
    </div>
    <table id="exampleq-5" class="display dataTable no-footer">
        <thead>
            <tr>
                <th>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                        <label class="custom-control-label" for="checkAll"></label>
                    </div>
                </th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox{{ $brand->id }}"
                                required="">
                            <label class="custom-control-label" for="customCheckBox{{ $brand->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $brand->image }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <div class="dropdown ml-auto text-right">
                            <div class="btn-link" data-toggle="dropdown">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ route('tenant.setup.brands.edit', $brand->id) }}">{{ __('Edit Brand') }}</a>

                                <form action="{{ route('tenant.setup.brands.destroy', $brand->id) }}" method="post"
                                    class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item">
                                        Delete Brand
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $brands->links() }}
</div>
