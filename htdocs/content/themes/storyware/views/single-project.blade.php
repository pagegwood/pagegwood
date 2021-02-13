@extends('layouts.master')

@section('default')

<article class="Post Post--project paddingY3 paddingY5--sm" id="post-{{$post->ID}}">
  @if($post->hasDesktopFeaturedImage())
  <div class="Container">
    @if($post->hasMobileFeaturedImage())
    <picture>
      <source media="(max-width: 500px)" srcset="{{ $post->mobile_featured_image->url }}">
      <img src="{{ $post->desktop_featured_image->url }}" alt="{{$post->title}}">
    </picture>
    @else
      <img src="{{ $post->desktop_featured_image->url }}" alt="{{$post->post_title}}">
    @endif
  </div>
  @endif
  <div class="Container Container--small">
    <section class="Post-content">
      <h1 class="size-h1 font-primary color-text weight-medium marginB1">{!! $post->post_title !!}</h1>
      <p class="font-secondary size-p color-text">
        {{ $post->launch_date }} - <a href="{{ $post->website_url }}" class="link link-color-six" title="View {{$post->title}}">{{ $post->website_url }}</a>
      </p>
      <div class="Content paddingY3 paddingY5--sm">
        {!! $post->post_content !!}
      </div>
      @if($post->hasTags())
      <ul class="List List--horizontal Post-tags marginB3 marginB5--sm">
      @foreach($post->tags as $tag)
          <li>
            <a href="{{ $tag->url }}" title="{{ $tag->name }}" class="link size-h6 font-primary text-uppercase weight-semiBold link-color-six">{{ $tag->name }}</a>
          </li>
      @endforeach
      </ul>
      @endif
    </section>
    <section class="Post-footer">
      <div class="text-center">
        <a class="Button Button--two" href="{{ $post->website_url }}" title="View {{$post->title}}">View the Project</a>
      </div>
      @if($post->prev || $post->next)
      <div class="paddingY3 paddingY5--sm">
        <div class="Grid">
          <div class="Grid-cell u-size1of2">
            @if($post->prev)
              <a href="{{$post->prev->url}}" title="{{$post->prev->title}}" class="link size-h6 font-primary text-uppercase weight-semiBold link-color-six"><i class="icon-chevron-thin-left"> </i>{{$post->prev->title}}</a>
            @endif
          </div>
          <div class="Grid-cell u-size1of2 text-right">
            @if($post->next)
              <a href="{{$post->next->url}}" title="{{$post->next->title}}" class="link size-h6 font-primary text-uppercase weight-semiBold link-color-six">{{$post->next->title}} <i class="icon-chevron-thin-right"> </i></a>
            @endif
          </div>
        </div>
      </div>
      @endif
    </section>
  </div>
</article>


@overwrite

