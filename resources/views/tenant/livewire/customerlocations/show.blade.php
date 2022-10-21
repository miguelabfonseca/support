<div class="table-responsive" wire:key="tenantteammembersshow">
    <div id="ajaxLoading" wire:loading.flex class="w-100 h-100 flex "
        style="background:rgba(255, 255, 255, 0.8);z-index:999;position:fixed;top:0;left:0;align-items: center;justify-content: center;">
        <div class="sk-three-bounce" style="background:none;">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="dataTables_wrapper" class="dataTables_wrapper">
        <div class="dataTables_length" id="dataTables_length">
            <label>{{ __('Show') }}
                <select name="perPage" aria-controls="select" wire:model="perPage">
                    <option value="10"
                        @if ($perPage == 10) selected @endif>10</option>
                    <option value="25"
                        @if ($perPage == 25) selected @endif>25</option>
                    <option value="50"
                        @if ($perPage == 50) selected @endif>50</option>
                    <option value="100"
                        @if ($perPage == 100) selected @endif>100</option>
                </select>
                {{ __('entries') }}</label>
        </div>
        <div id="dataTables_search_filter" class="dataTables_filter">
            <label>{{ __('Search') }}:
                <input type="search" name="searchString" wire:model="searchString"></label>
        </div>
    </div>
    <table id="dataTables-data" class="display dataTable no-footer">
        <thead>
            <tr>
                <th>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                        <label class="custom-control-label" for="checkAll"></label>
                    </div>
                </th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Mobile Phone') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Job') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teamMembers as $item)
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox{{ $item->id }}"
                                required="">
                            <label class="custom-control-label" for="customCheckBox{{ $item->id }}"></label>
                        </div>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->mobile_phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->job }}</td>
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
                                    href="{{ route('tenant.team-member.edit', $item->id) }}">{{ __('Edit Team Member') }}</a>
                                    <button class="dropdown-item btn-sweet-alert" data-type="form"
                                        data-route="{{ route('tenant.team-member.destroy', $item->id) }}"
                                        data-style="warning" data-csrf="csrf"
                                        data-text="{{ __('Do you want to delete this team member?') }}"
                                        data-title="{{ __('Are you sure?') }}"
                                        data-btn-cancel="{{ __('No, cancel it!!') }}"
                                        data-btn-ok="{{ __('Yes, delete it!!') }}" data-method="DELETE">
                                        {{ __('Delete Team Member') }}
                                    </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $teamMembers->links() }}
</div>
