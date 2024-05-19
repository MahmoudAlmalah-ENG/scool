<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="light-style layout-compact layout-navbar-fixed layout-menu-fixed"
      dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}/"
      data-base-url="{{ url('/') }}" data-framework="laravel"
      data-template="vertical-menu-theme-default-light">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Admin DashBord"/>
    <link rel="canonical" href="{{ $canonical ?? Request::url() }}"/>

    <title>
        @hasSection('title')
            @yield('title') |
        @endif
        {{ config('app.name') }}
    </title>

    @stack('meta')

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()], JSON_THROW_ON_ERROR) !!};
    </script>

    @stack('styles')
    @include('layouts._css')
    @livewireStyles

</head>
<body>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page" style="padding-left:0 !important;">

            @if(!isset($disableHeader))
                @include('layouts._nav') {{-- Navigation --}}
            @endif

            <div class="content-wrapper">

                @yield('content') {{-- Content --}}

            </div>
        </div>

    </div>
</div>


@include('layouts._js')
@include('layouts._model')
@stack('scripts')
@livewireScripts

</body>
</html>
