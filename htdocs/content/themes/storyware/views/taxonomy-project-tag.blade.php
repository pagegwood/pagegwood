@extends('layouts.master')

@section('default')


<div class="Hero Hero--interior">
  <div class="Hero-media"></div>
  <div class="Hero-content paddingY3 paddingY6--sm">
    <div class="Container text-center">

      <span class="Hero-caption block size-h1 font-primary weight-medium color-white">
        {!! $tag->name !!}
      </span>

      <div class="overflow-hidden">
        <h1 class="Hero-subcaption size-h4 inline-block letterspacing-2 font-primary weight-semiBold color-white text-uppercase marginT2 marginT5--sm">Work</h1>
      </div>
    </div>
  </div>
</div>


<div class="Posts paddingY4 paddingY6--sm">
  <div class="Container">
    <div class="Grid Grid--withGutter">
    @foreach($posts as $post)
      @if($post->hasLogoImage() && $post->hasPreviewImage())
      <div class="Grid-cell u-size1of2 u-md-size1of4">
        @include('partials.teaser-project')
      </div>
    @endif
    @endforeach
    </div>
    @if(get_previous_posts_link() || get_next_posts_link())
      <div class="Pagination paddingT5 size-reset text-center">
      @if(!empty(get_previous_posts_link()))
      <a href="{{ get_previous_posts_page_link() }}" class="Pagination-button Pagination-button--next Button Button--two marginT2">Newer</a>
      @endif
      @if(!empty(get_next_posts_link()))
        <a href="{{ get_next_posts_page_link() }}" class="Pagination-button Pagination-button--prev Button Button--two marginT2">Older</a>
      @endif
      </div>
    @endif
</div>

@overwrite

