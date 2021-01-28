@extends('blocks.block-wrapper')

@section('block-content')

  <div class="paddingY4 paddingY6--md">
    <div class="Container">
      @if(!empty($block->caption))
      <div class="Grid">
        <div class="Grid-cell u-md-size4of5">
          <span class="size-h3 block font-secondary weight-light color-text marginB3 marginB6--md">{{ $block->caption }}</span>
        </div>
      </div>
      @endif

      @if(!empty($block->heading))
      <h3 class="size-h5 font-primary weight-semiBold color-text text-uppercase letterspacing-2 marginB3"><span class="heading-border">{{ $block->heading }}</span></h3>
      @endif

      @foreach($block->posts as $post)
        @if(!$loop->last)
        <div class="marginB5">
        @endif
          @include('partials.teaser-post')
        @if(!$loop->last)
        </div>
        @endif
      @endforeach

      @if(!empty($block->button_caption) && !empty($block->button_url))
        <a class="Button Button--two marginT3 marginT6--md" href="{{ $block->button_url }}" title="{{ $block->button_caption }}">{{ $block->button_caption }}</a>
      @endif
    </div>
  </div>

@overwrite
