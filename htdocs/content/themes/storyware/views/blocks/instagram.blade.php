@extends('blocks.block-wrapper')

@section('block-content')

<div class="paddingY4 paddingY6--md">
    <div class="Container">
      <div class="Grid Grid--alignMiddle reverseColumns--mdMax">
        <div class="Grid-cell u-md-size1of2 text-center--md">
          <a class="link link-color-six font-primary text-uppercase size-h5" href="http://instagram.com/pagegwood" title="Page Wood on Instagram"><i class="icon-instagram"> </i>pagegwood</a>
          <div id="instafeed" class="Instafeed js-Instagram size-reset"></div>
        </div>
        <div class="Grid-cell u-md-size1of2 marginB2 marginB0--md">
          <div class="paddingX5--md">
            @if(!empty($block->heading))
            <h3 class="size-h3 font-secondary weight-light color-text marginB2">{!! $block->heading !!}</h3>
            @endif
            @if(!empty($block->button_caption) && !empty($block->button_url))
              <a class="Button Button--two" href="{{ $block->button_url }}" title="{{ $block->button_caption }}">{{ $block->button_caption }}</a>
            @endif
          </div>
        </div>
    </div>
  </div>


@overwrite
