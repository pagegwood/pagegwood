<!doctype html>
<html {!! get_language_attributes() !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    @head
    <style>
      @section('styles')@show
      @section('page-styles')@show
    </style>
    @if($site->hasHeaderTrackingCodes())
      @foreach($site->header_tracking_codes as $code)
        {!! $code->snippet !!}
      @endforeach
    @endif
    <script>
      var storyware = {};
      @section('scripts')@show
    </script>
</head>
<body @php(body_class())>
  <div id="js-App" class="App">
  @section('header')
  @include('partials.header')
  @show
  <main class="App-content" role="main" id="main">
  @section('content')
    @yield('default')
  @show
  </main>
  @section('modals')@show
  @section('footer')
    @include('partials.footer')
  @show
  </div>
  {!! wp_footer() !!}
  @if($site->hasFooterTrackingCodes())
    @foreach($site->footer_tracking_codes as $code)
      {!! $code->snippet !!}
    @endforeach
  @endif
@section('footer_scripts')@show
</body>
</html>
