<div class="col-10">
    <div class="row">
        <section class="col-6">
            <label>{{ __('District') }}</label>
            <select type="text" name="district" id="district" class="form-control" wire:model="district">
                <option value="">{{ __('Select district') }}</option>
                @foreach($districts as $value)
                    <option value="{{ $value->id }}" @if($district==$value->id) selected @endif>{{ $value->name }}</option>
                @endforeach
            </select>
        </section>
        <section class="col-6">
            <label>{{ __('City') }}</label>
            <select type="text" name="county" id="county" class="form-control">
                <option value="" @if(!$county) selected @endif>{{ __('Select city') }}</option>
                @if(isset($counties))
                    @foreach($counties as $value)
                        <option value="{{ $value->id }}" @if($county==$value->id) selected @endif>{{ $value->name }}</option>
                    @endforeach
                @endif
            </select>
        </section>
    </div>
</div>
