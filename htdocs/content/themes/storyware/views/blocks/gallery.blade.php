@extends('blocks.block-wrapper')

@section('block-content')

<div class="Gallery clearfix js-Lightbox">
  @foreach($block->gallery->images as $image)
    <div class="Gallery-item">
      <a href="{{ $image->url }}" title="{{ $image->post_title }}" style="background-image:url({!! wp_get_attachment_image_url($image->ID, 'large') !!}); background-size:cover; background-position:center center; padding-bottom:100%; display:block;">
      </a>
    </div>
  @endforeach
</div>

@overwrite
