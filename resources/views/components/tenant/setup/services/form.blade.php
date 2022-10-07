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
                            <div class="col-8 mb-3">
                                <div class="form-group row">
                                    <label>{{ __('Service Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        @isset($name)value="{{ $name }}"@endisset
                                        placeholder="{{ __('Service Name') }}">

                                        <label>{{ __('Description') }}</label>
                                        <input type="text" name="description" id="description" class="form-control"
                                            @isset($description)value="{{ $description }}"@endisset
                                            placeholder="{{ __('Description') }}">

                                        <label>{{ __('Type') }}</label>
                                        <input type="text" name="type" id="type" class="form-control"
                                            @isset($type)value="{{ $type }}"@endisset
                                            placeholder="{{ __('Type') }}">

                                        <label>{{ __('Payment') }}</label>
                                        <input type="text" name="payment" id="payment" class="form-control"
                                            @isset($payment)value="{{ $payment }}"@endisset
                                            placeholder="{{ __('Payment') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <a href="{{ route('tenant.setup.services.index') }}"
                                    class="btn btn-secondary mr-2">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ $buttonAction }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
