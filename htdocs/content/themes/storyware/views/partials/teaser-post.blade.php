<article class="Tease Tease--{{$post->post_type}}{{ $loop->last ? '' : ' border-bottom' }}" id="tease-{{$post->ID}}">
  <a href="{{$post->url}}" title="{{ $post->post_title }}" class="Post-link link link-color-six">
      <h2 class="size-h2 weight-normal font-primary marginB1">
          {{ $post->post_title }}
      </h2>
      <time datetime="{{ $post->post_date }}" class="size-h6 font-secondary weight-light">{{ $post->display_date }}</time>
      <span class="Post-status inline-block text-uppercase weight-medium font-primary color-three" aria-hidden="true">
          Unread
      </span>
  </a>
</article>
