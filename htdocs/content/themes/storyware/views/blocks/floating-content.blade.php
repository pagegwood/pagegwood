@extends('blocks.block-wrapper')

@section('block-content')

<div class="Floating paddingY3 paddingY6--sm">
  <div class="Container overflow-hidden">
    <div class="Grid Grid--withGutter Grid--gutter{{ $block->gutter_size }} {{ $block->breakpoint == 'sm' ? ' reverseColumns--smMax' : ''  }}{{ $block->breakpoint == 'md' ? ' reverseColumns--mdMax' : '' }}">
      <div class="Grid-cell u-{{ $block->breakpoint }}-size{{ $block->content_size }}">
        <div class="Content">
          {!! $block->content !!}
        </div>
      </div>
      @if($block->hasImage())
      <div class="Grid-cell u-{{ $block->breakpoint }}-size{{ $block->media_size }} marginB3">
        <img src="{{ $block->image->url }}">
      </div>
      @endif
    </div>
  </div>
</div>

@overwrite
