<div>
    <div id="ajaxLoading" wire:loading.flex class="w-100 h-100 flex "
        style="background:rgba(255, 255, 255, 0.8);z-index:999;position:fixed;top:0;left:0;align-items: center;justify-content: center;">
        <div class="sk-three-bounce" style="background:none;">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $homePanel }}" data-toggle="tab" href="#homePanel"><i class="la la-home mr-2"></i> {{ __('Customer') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $servicesPanel }}" data-toggle="tab" href="#servicesPanel"><i class="flaticon-381-notepad mr-2"></i> {{ __('Service') }}</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ $profile }}" data-toggle="tab" href="#contact"><i class="la la-phone mr-2"></i> Contacts</a>
        </li> --}}
    </ul>
    <form wire:submit.prevent="save" class="tab-content">
        @csrf
        @if ($update)
        @method('PUT')
        @endif
        <div class="tab-pane fade {{ $homePanel }}" id="homePanel" role="tabpanel">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <section class="col" wire:ignore>
                                                <label>{{ __('Customer Name') }}</label>
                                                <select name="selectedCustomer" id="selectedCustomer"
                                                    wire:model="selectedCustomer">
                                                    <option value="">{{ __('Select Customer') }}</option>
                                                    @forelse ($customerList as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $selectedCustomer)
                                                        selected @endif>{{ $item->name }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            </section>
                                        </div>
                                        @if($selectedCustomer)
                                        <div class="form-group row">
                                            <section class="col-9">
                                                <label>{{ __('Customer Name') }}</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $customer->name }}" readonly>
                                            </section>
                                            <section class="col-3">
                                                <label>{{ __('VAT') }}</label>
                                                <input type="text" name="vat" id="vat" class="form-control"
                                                    value="{{ $customer->vat }}" readonly>
                                            </section>
                                        </div>
                                        <div class="form-group row">
                                            <section class="col-3">
                                                <label>{{ __('Phone number') }}</label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                    value="{{ $customer->contact }}" readonly>
                                            </section>
                                            <section class="col-9">
                                                <label>{{ __('Primary e-mail address') }}</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    value="{{ $customer->email }}" readonly>
                                            </section>
                                        </div>
                                        <div class="form-group row">
                                            <section class="col-12">
                                                <label>{{ __('Customer Address') }}</label>
                                                <input type="text" name="address" id="address" class="form-control"
                                                    value="{{ $customer->address }}" readonly>
                                            </section>
                                        </div>
                                        <div class="form-group row">
                                            <section class="col-2">
                                                <label>{{ __('Zip Code') }}</label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control"
                                                    value="{{ $customer->zipcode }}" readonly>
                                            </section>
                                        </div>
                                        @endisset
                                        <div class="form-group row">
                                            <div class="col text-right">
                                                <a href="{{ route('tenant.services.index') }}"
                                                    class="btn btn-secondary mr-2">{{
                                                    __('Cancel') }}</a>
                                                <button type="submit" class="btn btn-primary">{{ $buttonAction
                                                    }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade {{ $servicesPanel }}" id="servicesPanel">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <section class="col" wire:ignore>
                                                <label>{{ __('Service Name') }}</label>
                                                <select name="selectedService" id="selectedService"
                                                    wire:model="selectedService">
                                                    <option value="">{{ __('Select Service') }}</option>
                                                    @forelse ($serviceList as $item)
                                                    <option value="{{ $item->id }}" @if($item->id == $selectedService)
                                                        selected @endif>{{ $item->name }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            </section>
                                        </div>
                                        @if($selectedService)
                                        <div class="form-group row">
                                            <section class="col">
                                                <label>{{ __('Service Name') }}</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $service->name }}" readonly>
                                            </section>
                                        </div>
                                        <div class="form-group row" wire:ignore>
                                            <section class="col-4">
                                                <label>{{ __('Start Date') }}</label>
                                                <input type="text" name="start_date" id="start_date" class="form-control" class="datepicker-default">
                                            </section>
                                            <section class="col-4">
                                                <label>{{ __('End Date') }}</label>
                                                <input type="text" name="end_date" id="end_date" class="form-control">
                                            </section>
                                            <section class="col-4">
                                                <label>{{ __('Contract type') }}</label>
                                                <input type="text" name="type" id="type" class="form-control">
                                            </section>
                                        </div>
                                        @endisset
                                        <div class="form-group row">
                                            <div class="col text-right">
                                                <a href="{{ route('tenant.services.index') }}"
                                                    class="btn btn-secondary mr-2">{{
                                                    __('Cancel') }}</a>
                                                <button type="submit" class="btn btn-primary">{{ $buttonAction
                                                    }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="contact">
eee
        </div>

    </form>

    @push('custom-scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            restartObjects();
           jQuery('#selectedCustomer').select2();
           jQuery('#selectedService').select2();
            jQuery("#selectedCustomer").on("select2:select", function (e) { @this.selectedCustomer = jQuery('#selectedCustomer').find(':selected').val(); });
            jQuery("#selectedService").on("select2:select", function (e) { @this.selectedService = jQuery('#selectedService').find(':selected').val(); });



        });

        window.addEventListener('contentChanged', event => {
            restartObjects();
        });

        window.addEventListener('swal',function(e){
            swal(e.detail.title, e.detail.message, e.detail.status);
            restartObjects();
        });

        function restartObjects()
        {
            jQuery('#start_date').pickadate({
                onSet: function(thingSet) {
                    @this.start_date = formatDate(thingSet.select);
                }
            });
            jQuery('#end_date').pickadate({
                onSet: function(thingSet) {
                    @this.end_date = formatDate(thingSet.select);
                }
            });
        }

        function formatDate(unixDate)
        {
            var date = new Date(unixDate);
            var year = date.getFullYear();
            var month = "0" + (date.getMonth()+1);
            var day = "0" + date.getDate();
            var formattedTime = year + '/' + month.substr(-2) + '/' + day.substr(-2);
            console.log(formattedTime);
            return formattedTime;
        }

    </script>
</div>
@endpush
