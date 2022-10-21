<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $formTitle }}</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($update)
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <section class="col-9">
                                        <label>{{ __('Customer Name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            @isset($name)value="{{ $name }}" @endisset
                                            @if(null !== old('name'))value="{{ old('name') }}"@endisset
                                            placeholder="{{ __('Customer Name') }}">
                                    </section>
                                    <section class="col-3">
                                        <label>{{ __('VAT') }}</label>
                                        <input type="text" name="vat" id="vat" class="form-control"
                                            @isset($vat)value="{{ $vat }}" @endisset
                                            @if(null !== old('vat'))value="{{ old('vat') }}"@endisset
                                            placeholder="{{ __('VAT') }}">
                                    </section>
                                </div>
                                <div class="form-group row">
                                    <section class="col-3">
                                        <label>{{ __('Phone number') }}</label>
                                        <input type="text" name="contact" id="contact" class="form-control"
                                            @isset($contact)value="{{ $contact }}" @endisset
                                            @if(null !== old('contact'))value="{{ old('contact') }}"@endisset
                                            placeholder="{{ __('Phone number') }}">
                                    </section>
                                    <section class="col-9">
                                        <label>{{ __('Primary e-mail address') }}</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            @isset($email)value="{{ $email }}" @endisset
                                            @if(null !== old('email'))value="{{ old('email') }}"@endisset
                                            placeholder="{{ __('Primary e-mail address') }}">
                                    </section>
                                </div>
                                <div class="form-group row">
                                    <section class="col-12">
                                        <label>{{ __('Customer Address') }}</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            @isset($address)value="{{ $address }}" @endisset
                                            @if(null !== old('address'))value="{{ old('address') }}"@endisset
                                            placeholder="{{ __('Customer Address') }}">
                                    </section>
                                </div>
                                <div class="form-group row">
                                    <section class="col-2">
                                        <label>{{ __('Zip Code') }}</label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control"
                                            @isset($zipcode)value="{{ $zipcode }}" @endisset
                                            @if(null !== old('zipcode'))value="{{ old('zipcode') }}"@endisset
                                            placeholder="{{ __('Zip Code') }}">
                                    </section>
                                    @livewire('tenant.common.location',  ['districts' => $districts, 'counties' => $counties, 'district' => $district, 'county' => $county])
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <a href="{{ route('tenant.customers.index') }}" class="btn btn-secondary mr-2">{{
                                    __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ $buttonAction }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
