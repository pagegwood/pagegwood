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

<div class="Hero Hero--interior">
  <div class="Hero-media"></div>
  <div class="Hero-content paddingY3 paddingY6--sm">
    <div class="Container text-center">
      @if(!empty($block->heading))
      <span class="Hero-caption block size-h1 font-primary weight-medium color-white">{!! $block->heading !!}</span>
      @endif
      @if(!empty($block->subheading))
        <div class="overflow-hidden">
          <h1 class="Hero-subcaption size-h4 inline-block letterspacing-2 font-primary weight-semiBold color-white text-uppercase marginT2 marginT5--sm">{!! $block->subheading !!}</h1>
        </div>
      @endif
    </div>
  </div>
</div>

@overwrite
