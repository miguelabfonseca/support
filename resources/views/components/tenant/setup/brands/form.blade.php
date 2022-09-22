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
                                    <label>{{ __('Brand Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        @isset($name)value="{{ $name }}"@endisset
                                        placeholder="{{ __('Brand Name') }}">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-primary btn-sm" type="button">Button</button>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="file" id="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                @if(isset($image))
                                    <input type="hidden" name="image" id="image" value="{{ $image }}">
                                    <img src="{{ $image }}" alt="{{ $name }}" style="max-width:100%;">
                                @endif
                            </div>
                        </div><img src="{{ tenant_asset('image.jpg') }}">
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <a href="{{ route('tenant.setup.brands.index') }}"
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
