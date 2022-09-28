<div class="table-responsive" wire:key="tenantsetupservicesshowservices">
    <div id="ajaxLoading" wire:loading.flex class="w-100 h-100 flex "
        style="background:rgba(255, 255, 255, 0.8);z-index:999;position:fixed;top:0;left:0;align-items: center;justify-content: center;">
        <div class="sk-three-bounce" style="background:none;">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
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
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Payment') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox{{ $service->id }}"
                                required="">
                            <label class="custom-control-label" for="customCheckBox{{ $service->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->type }}</td>
                    <td>{{ $service->payment }}</td>
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
                                    href="{{ route('tenant.setup.services.edit', $service->id) }}">{{ __('Edit Service') }}</a>
                                    <button class="dropdown-item btn-sweet-alert" data-type="form"
                                        data-route="{{ route('tenant.setup.services.destroy', $service->id) }}"
                                        data-style="warning" data-csrf="csrf"
                                        data-text="{{ __('Do you want to delete this service?') }}"
                                        data-title="{{ __('Are you sure?') }}"
                                        data-btn-cancel="{{ __('No, cancel it!!') }}"
                                        data-btn-ok="{{ __('Yes, delete it!!') }}" data-method="DELETE">
                                        {{ __('Delete Service') }}
                                    </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @php
        $count = 0;
    @endphp
    @foreach ($services as $service )
        @php
            $count = $count + 1;
        @endphp
    @endforeach

    @if($count > 1)
        {{ $services->links() }}
    @endif
</div>
