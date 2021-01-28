@extends('blocks.block-wrapper')

@section('block-content')

<div class="paddingY2 overflow-hidden">
  <div class="Container">
    <div class="Grid Grid--alignMiddle Grid--withGutter Grid--gutterLarge">
      <div class="Grid-cell u-md-size1of2">
        <div class="paddingY2 paddingY5--sm">
          @if(!empty($block->heading))
            <h3 class="size-h3 font-secondary weight-light color-text">{!! $block->heading !!}</h3>
          @endif
        </div>
      </div>
      <div class="Grid-cell u-md-size1of2">
        <div class="paddingY2 paddingY5--sm text-center--md">
          @if(!empty($block->button_caption) && !empty($block->button_url))
            <a class="Button Button--two Button--giant" href="{{ $block->button_url }}" title="{{ $block->button_caption }}">{{ $block->button_caption }}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@overwrite
