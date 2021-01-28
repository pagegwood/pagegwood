@extends('layouts.master')


@section('styles')

@if($page->hasMobileImage())
@media all and (max-width: 768px){
    .Hero-media {
      background: url({{ $page->mobile_image->url }});
    }
}
@endif

@if($page->hasDesktopImage())
@if($page->hasMobileImage())
@media all and (min-width: 769px){
  @endif
    .Hero-media {
    background: url({{ $page->desktop_image->url }});
  }
}
@endif

@endsection


@section('default')

    @if($page->hasDesktopImage())
    <div class="Hero Hero--interior">
    <div class="Hero-media"></div>
        <div class="Hero-content paddingY3 paddingY6--sm">
            <div class="Container text-center">

                <h1 class="Hero-caption block size-h1 font-primary weight-medium color-white">
                  {!! $title !!}
                </h1>

                @if(!empty($page->subheading))
                    <div class="overflow-hidden">
                        <h1 class="Hero-subcaption size-h4 inline-block letterspacing-2 font-primary weight-semiBold color-white text-uppercase marginT2 marginT5--sm">{!! $page->subheading !!}</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif


    <div class="Posts paddingY3 paddingY5--sm">
        <div class="Container">
            @foreach($posts as $post)
                @if(!$loop->last)
                <div class="marginB5">
                @endif
                    @include('partials.teaser-post')
                @if(!$loop->last)
                </div>
                @endif
            @endforeach
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
    </div>
@overwrite

