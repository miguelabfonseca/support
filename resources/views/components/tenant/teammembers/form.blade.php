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
                                    <section class="col-7">
                                        <label>{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            @isset($name)value="{{ $name }}" @endisset
                                            @if(null !== old('name'))value="{{ old('name') }}"@endisset
                                            placeholder="{{ __('Name') }}">
                                    </section>
                                    <section class="col-5">
                                        <label>{{ __('Mobile Phone') }}</label>
                                        <input type="text" name="mobile_phone" id="mobile_phone" class="form-control"
                                            @isset($mphone)value="{{ $mphone }}" @endisset
                                            @if(null !== old('mobile_phone'))value="{{ old('mobile_phone') }}"@endisset
                                            placeholder="{{ __('Mobile Phone') }}">
                                    </section>
                                </div>
                                <div class="form-group row">
                                    <section class="col-7">
                                        <label>{{ __('E-mail address') }}</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            @isset($email)value="{{ $email }}" @endisset
                                            @if(null !== old('email'))value="{{ old('email') }}"@endisset
                                            placeholder="{{ __('E-mail address') }}">
                                    </section>
                                    <section class="col-5">
                                        <label>{{ __('Job') }}</label>
                                        <input type="text" name="job" id="job" class="form-control"
                                            @isset($job)value="{{ $job }}" @endisset
                                            @if(null !== old('job'))value="{{ old('job') }}"@endisset
                                            placeholder="{{ __('Job') }}">
                                    </section>
                                </div>
                                <div class="form-group row">
                                    <section class="col-12">
                                        <label>{{ __('Additional Information') }}</label>
<textarea name="additional_information" id="additional_information" class="form-control" placeholder="{{ __('Additional Information') }}" rows="10">
@isset($addinfo){{ $addinfo }} @elseif (null !== old('additional_information')) {{ old('additional_information') }} @endisset
</textarea>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12 text-right">
                                <a href="{{ route('tenant.team-member.index') }}" class="btn btn-secondary mr-2">{{
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
