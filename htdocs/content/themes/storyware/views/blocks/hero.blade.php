@extends('blocks.block-wrapper')

@section('styles')
@parent

@if ($block->hasMobileImage())
@media all and (max-width: 768px){
#Block-{{ $index }} .Hero-media {
  background-image: url({{ $block->mobile_image->url }});
}
}

@endif

@if ($block->hasDesktopImage())
@if ($block->hasMobileImage())
@media all and (min-width: 769px){
@endif
  #Block-{{ $index }} .Hero-media {
    background-image: url({{ $block->desktop_image->url }});
  }
@if ($block->hasMobileImage())
}
@endif
@endif

@stop

@section('block-content')

@if($block->hasDesktopImage())
<div class="Hero">
    <div class="Hero-media"></div>
    <div class="Hero-content paddingY3 paddingY4--sm">
      <div class="Container">
        @if($block->hasLogo())
        <div class="Hero-logo marginB3 marginB10--sm">
          <a class="Branding Branding--hero" href="/" title="{{ get_bloginfo('name') }}" rel="home">
            <img src="{!! get_template_directory_uri() !!}/assets/svg/page-g-wood.svg" alt="{{ get_bloginfo('name') }}">
          </a>
        </div>
        @endif

        @if(!empty($block->heading))
        <h1 class="Hero-caption paddingY2 paddingY5--sm size-hero font-primary weight-medium color-white">{{ $block->heading }}</h1>
        @endif
        @if($block->hasMenu())
          <nav id="nav-main" class="Nav Nav--hero marginT3" role="navigation">
            {!! wp_nav_menu(array(
              'container' => false,
              'menu_class' => 'menu',
              'theme_location' => 'main',
              ))
            !!}
          </nav><!-- #nav -->
        @endif
      </div>
    </div>
  </div>
@endif

@overwrite
