<!doctype html>
<html {!! get_language_attributes() !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    @if($site->hasHeaderTrackingCodes())
      @foreach($site->header_tracking_codes as $code)
        @if($code->production_only == true && $env == 'production')
          {!! $code->snippet !!}
        @elseif($code->production_only == false)
          {!! $code->snippet !!}
        @endif
      @endforeach
    @endif
    @head
    <style>
      @section('styles')@show
      @section('page-styles')@show
    </style>
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
      @if($code->production_only == true && $env == 'production')
        {!! $code->snippet !!}
      @elseif($code->production_only == false)
        {!! $code->snippet !!}
      @endif
    @endforeach
  @endif
@section('footer_scripts')@show
</body>
</html>
