@include('layouts.header')

@yield('content')

{!! $seoSettings->footer_scripts ?? '' !!}
@include('layouts.footer')