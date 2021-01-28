@extends('layouts.master')


@section('styles')

@if(has_post_thumbnail( $post->ID ))
@media all and (max-width: 768px){
    .Hero-media {
      background: url({!! wp_get_attachment_image_url($image->ID) !!});
    }
}
@endif

@endsection

@section('default')


<div class="Hero Hero--interior">
  <div class="Hero-media"></div>
  <div class="Hero-content paddingY3 paddingY6--sm">
    <div class="Container text-center">
      <span class="Hero-caption block size-h1 font-primary weight-medium color-white">{!! $post->post_title !!}</span>
        <div class="overflow-hidden">
          <h1 class="Hero-subcaption size-h4 inline-block letterspacing-2 font-primary weight-semiBold color-white text-uppercase marginT2 marginT5--sm"><span>By</span><a href="{{ $post->author->url }}"> {{ $post->author_name }} </a><span class="display-none inline-block--sm">&bull;</span> <span class="block inline-block--sm">{{ $post->display_date }}</span></h1>
        </div>
    </div>
  </div>
</div>

<article class="Post Post--{{$post->post_type}} overflow-hidden paddingY3 paddingY5--sm" id="post-{{ $post->ID}}">
  <div class="Container Container--small">
    <section class="Post-content">
      <div class="Content paddingB5">
        {!! $post->content !!}
      </div>
      @if($post->hasTags())
      <ul class="List List--horizontal Post-tags marginB3 marginB5--sm">
      @foreach($post->tags as $tag)
          <li>
            <a href="{{ $tag->url }}" title="{{ $tag->name }}" class="link size-h6 font-primary text-uppercase weight-semiBold link-color-six">{!! $tag->name !!}</a>
          </li>
      @endforeach
      </ul>
      @endif
    </section>
  </div>
  <div class="background-seven paddingY3">
    <div class="Container Container--small">
      <section class="Post-footer">
        <span class="size-h5 block font-primary weight-semiBold color-text marginB2 text-uppercase letterspacing-2 marginB1">Share this Post</span>
        <ul class="Share List List--horizontal List--icons">
          <li class="Share-item">
            <a class="Share-link link link-color-two u-displayBlock" href="https://twitter.com/share?url={{ $post->link|url_encode(true) }}&amp;text={{ 'Check this out: ' ~ $post->post_title|url_encode(true) }}&amp;via=PageGWood" target="_blank">
              <i class="icon icon-twitter"> </i>
            </a>
          </li>
          <li class="Share-item">
            <a class="Share-link link link-color-two u-displayBlock" href="https://www.facebook.com/dialog/share?app_id=215932312147266&amp;redirect_uri={{ urlencode($post->url) }}&amp;href={{ urlencode($post->url) }}" target="_blank">
              <i class="icon icon-facebook"> </i>
            </a>
          </li>
          <li class="Share-item">
            <a class="Share-link link link-color-two u-displayBlock" href="mailto:?subject={{ $post->post_title|url_encode(true) }}&amp;body={{ urlencode('You should check out' . $post->post_title . ' by Page Wood at ') }}{{ urlencode($post->url) }}">
              <i class="icon icon-envelope-o"> </i>
            </a>
          </li>
          <li class="Share-item">
            <a class="Share-link link link-color-two u-displayBlock" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $post->link|url_encode(true) }}&amp;href={{ $post->link|url_encode(true) }}&amp;title={{ $post->post_title|url_encode(true) }}&amp;summary={{ $post->exceprt|url_encode(true) }}&amp;source={{ 'Page G Wood, Web Developer & UX Designer'|url_encode(true) }}">
              <i class="icon-linkedin"> </i>
            </a>
          </li>
          <li class="Share-item">
            <a class="Share-link link link-color-two u-displayBlock" target="_blank" href="https://plus.google.com/share?url={{ $post->link|url_encode(true) }}">
              <i class="icon-google-plus"> </i>
            </a>
          </li>
        </ul>
      </section>
    </div>
  </div>
  {% if $post->comment_status != 'closed' %}
    <div class="paddingT3 paddingT5--sm">
      <section class="Comments">
        {% if $post->comment_count > 0 %}
          <div class="paddingY3 paddingY5--sm">
          <hr>
        </div>
        <div class="Container Container--small">
          <h3 class="size-h3 font-primary weight-light color-text marginB3 marginB5--sm">{{ $post->comment_count }} Comment{{ ($post->comment_count != 0 and $post->comment_count > 1) ? 's' : '' }}</h3>
          <div class="Responses">
            {% for cmt in $post->get_comments() %}
              {% include "partials/comment.twig" with {comment:cmt} %}
            {% endfor %}
          </div>
        </div>
        {% endif %}
        <div class="Container Container--small">
          <h3 class="size-h3 font-primary weight-light color-text paddingB2">Leave a Comment</h3>
          <div class="Respond">
            {{ fn('comment_form') }}
          </div>
        </div>
      </section>
    </div>
  {% endif %}
</article>

@overwrite

