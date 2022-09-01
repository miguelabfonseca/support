<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $formTitle }}</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ $action }}" method="post">
                        @csrf
                        @if ($update)
                            @method('PUT')
                        @endif
                        <div class="form-group row">
                            <label>{{ __('Brand Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control"
                            @isset($name)value="{{ $name }}"@endisset placeholder="{{ __('Brand Name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $buttonAction }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
