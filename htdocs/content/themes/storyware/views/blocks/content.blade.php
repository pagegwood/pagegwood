@extends('blocks.block-wrapper')

@section('block-content')

<div class="{{ $block->remove_bottom_padding == true ? 'paddingT4 paddingT6--sm' : 'paddingY4 paddingY6--sm' }}">
  <div class="Container Container--{{ $block->container_size }}">
    <div class="Content">
      {!! $block->content !!}
    </div>
  </div>
</div>

@overwrite
