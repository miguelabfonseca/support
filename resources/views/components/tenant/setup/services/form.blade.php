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
                                    <label>{{ __('Service Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        @isset($name)value="{{ $name }}"@endisset
                                        @if(null !== old('name'))value="{{ old('name') }}"@endisset
                                        placeholder="{{ __('Service Name') }}">

                                        <label>{{ __('Description') }}</label>
                                        <input type="text" name="description" id="description" class="form-control"
                                            @isset($description)value="{{ $description }}"@endisset
                                            @if(null !== old('description'))value="{{ old('description') }}"@endisset
                                            placeholder="{{ __('Description') }}">

                                        <label>{{ __('Type') }}</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">{{ __('Select type') }}</option>
                                            @forelse ($typeList as $item)
                                                <option value="{{ $item->id }}" @if(isset($type) && $type == $item->id) selected @endif>{{ $item->description }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label>{{ __('Payment') }}</label>
                                        <select name="payment" id="payment" class="form-control">
                                            <option value="">{{ __('Select payment type') }}</option>
                                            @forelse ($paymentList as $item)
                                                <option value="{{ $item->id }}" @if(isset($payment) && $payment == $item->id) selected @endif>{{ $item->description }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col text-right">
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
