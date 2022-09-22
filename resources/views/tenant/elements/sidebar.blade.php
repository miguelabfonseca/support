<!--**********************************
  Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <a href="#" class="add-menu-sidebar">{{ __('New Task') }}</a>
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href="{{ route('tenant.dashboard') }}">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-windows"></i>
                    <span class="nav-text">{{ __('Manage Tasks') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.tasks.list') }}">Tasks</a></li>
                    <li><a href="{{ route('tenant.tasks.reports.list') }}">Tasks Reports</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">{{ __('Manage Devices') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.devices.list') }}">{{ __('Devices') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">{{ __('Manage Services') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.services.list') }}">{{ __('Services') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-id-card-1"></i>
                    <span class="nav-text">{{ __('Manage Customers') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.customers.list') }}">{{ __('Customers') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking-1"></i>
                    <span class="nav-text">{{ __('Manage Partners') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.partners.list') }}">{{ __('Partners') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">{{ __('Team') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.team.list') }}">{{ __('List Team') }}</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-6"></i>
                    <span class="nav-text">{{ __('Setup') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('tenant.setup.devices.list') }}">{{ __('Device Models') }}</a></li>
                    <li><a href="{{ route('tenant.setup.brands.index') }}">{{ __('Device Brands') }}</a></li>
                    <li><a href="{{ route('tenant.setup.parts.list') }}">{{ __('Parts') }}</a></li>
                    <li><a href="{{ route('tenant.setup.attributes.list') }}">{{ __('Attributes') }}</a></li>
                    <li><a href="{{ route('tenant.setup.attributesvalues.list') }}">{{ __('Attributes Values') }}</a></li>
                </ul>
            </li>
        </ul>
        <div class="copyright">
            <p><strong>BR & VR Support Dashboard</strong> © {{ date('Y') }} {{ __('All Rights Reserved') }}</p>
        </div>
    </div>
</div>
<!--**********************************
  Sidebar end
***********************************-->
