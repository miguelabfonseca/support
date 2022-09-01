<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('dz.name') }} | {{ $attributes['title'] }}</title>

	<meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ global_asset('storage/resources/images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

	@if(!empty(config('dz.public.pagelevel.css.'.$attributes['themeAction'])))
		@foreach(config('dz.public.pagelevel.css.'.$attributes['themeAction']) as $style)
				<link href="{{ global_asset('storage/resources/' . $style) }}" rel="stylesheet" type="text/css"/>
		@endforeach
	@endif
	@if(!empty(config('dz.public.sweet.css')))
		@foreach(config('dz.public.sweet.css') as $style)
				<link href="{{ global_asset('storage/resources/' . $style) }}" rel="stylesheet" type="text/css"/>
		@endforeach
	@endif
	{{-- Global Theme Styles (used by all pages) --}}
	@if(!empty(config('dz.public.global.css')))
		@foreach(config('dz.public.global.css') as $style)
			<link href="{{ global_asset('storage/resources/' . $style) }}" rel="stylesheet" type="text/css"/>
		@endforeach
	@endif
    @livewireStyles

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{!! url('/index'); !!}" class="brand-logo">
			@if(!empty($logo))
				<img class="logo-abbr" src="{{ asset($logo) }}" alt="">
			@else
                <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
			@endif
			@if(!empty($logoText))
                <img class="logo-compact" src="{{ asset($logoText) }}" alt="">
                <img class="brand-title" src="{{ asset($logoText) }}" alt="">
			@else
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
			@endif
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

		@include('tenant.elements.header')


        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('tenant.elements.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->



        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            {{ $slot }}
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

		@include('tenant.elements.footer')

        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	@include('tenant.elements.footer-scripts')
    <script>
        jQuery(document).ready(function() {
            if( "{{ $attributes['message'] }}" != "" ) {
                if( "{{ $attributes['status'] }}" == "sucess" ) {
                    swal("{{ __('Success') }}", "{{ $attributes['message'] }}", "success");
                } else if ("{{ $attributes['status'] }}" == "error") {
                    swal("{{ __('Error') }}", "{{ $attributes['message'] }}", "error");
                } else if ("{{ $attributes['status'] }}" == "info") {
                    swal("{{ __('Information') }}", "{{ $attributes['message'] }}", "info");
                }
            }

            var emptyFrom = '';

            jQuery('body').on('click', '.btn-sweet-alert', function() {
                swal.fire({
                    title: jQuery(this).attr('data-title'),
                    text: jQuery(this).attr('data-text'),
                    type: jQuery(this).attr('data-style'),
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    cancelButtonText: "No, cancel it !!",
                    // closeOnConfirm: !1,
                    // closeOnCancel: !1
                }).then((e) => {
                    // <button class="dropdown-item btn-sweet-alert" data-type="form"
                    //     data-route=""
                    //     data-style="warning" data-csrf="csrf"
                    //     data-text="{{ __('Do you want to delete this brand?') }}"
                    //     data-title="{{ __('Are you sure?') }}"
                    //     data-btn-cancel="{{ __('No, cancel it!!') }}"
                    //     data-btn-ok="{{ __('Yes, delete it!!') }}" data-method="DELETE">
console.log(e);
                    if(e.value) {
                        if(jQuery(this).attr('data-type') == 'form') {
                            emptyFrom = '<form action="' + jQuery(this).attr('data-route') + '" method="post" id="formAction">';
                        }
                        if(jQuery(this).attr('data-csrf') == 'csrf') {
                            emptyFrom += '@csrf';
                        }
                        if(jQuery(this).attr('data-method') == 'DELETE') {
                            emptyFrom += 'method="@method('DELETE')"';
                        }
                        emptyFrom += '</form>';
                        jQuery('#generatedScripts').append(emptyFrom);
                        jQuery('#formAction').submit();
                        // jQuery('')
                        // $.ajax({
                        //     type: "GET",
                        //     url: jQuery('#base_url').val() + '/carrinho/carregar_listas',
                        //     dataType: "json",
                        //     complete: function(res)
                        //     {
                        //         var data = res.responseJSON;
                        //         console.log(data);
                        //         if (data.status == 'ok')
                        //         {
                        //             jQuery('#nome_lista option').each(function() {
                        //                 $(this).remove();
                        //             });

                        //             $("#nome_lista").append('<option value="">Selecione Lista</option>');
                        //             $("#nome_lista").append('<option value="nova">Nova Lista</option>');

                        //             for (var key in  data.listas ) {
                        //                 $("#nome_lista").append('<option value="' + data.listas[key]['id'] + '">' + data.listas[key]['descricao'] + '</option>');
                        //             }
                        //         }
                        //     }
                        // });
                    }
                });
            });
        })
    </script>
    <div id="generatedScripts"></div>
</body>
</html>
