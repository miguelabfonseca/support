@if(!empty(config('dz.public.global.js')))
	@foreach(config('dz.public.global.js') as $script)
        <script src="{{ global_asset('storage/resources/' . $script) }}" type="text/javascript"></script>
	@endforeach
@endif
@if(!empty(config('dz.public.pagelevel.js.'.$attributes['themeAction'])))
	@foreach(config('dz.public.pagelevel.js.'.$attributes['themeAction']) as $script)
        <script src="{{ global_asset('storage/resources/' . $script) }}" type="text/javascript"></script>
	@endforeach
@endif
@livewireScripts
