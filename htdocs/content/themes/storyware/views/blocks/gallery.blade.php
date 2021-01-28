@extends('blocks.block-wrapper')

@section('block-content')

<div class="Gallery clearfix js-Lightbox">
  @foreach($block->gallery->images as $image)
    <div class="Gallery-item">
      <a href="{{ $image->url }}" title="{{ $image->post_title }}">
        <img src="{!! wp_get_attachment_image_url($image->ID, 'medium') !!}">
      </a>
    </div>
  @endforeach
</div>

@overwrite
