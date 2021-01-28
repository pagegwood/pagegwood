<article class="Tease Tease--project" id="tease-{{ $post->ID }}">
  <a href="{{ $post->url }}" title="{{ $post->post_title }}" class="Post-link link link-color-six">
    <div class="Tease-preview" style="background:url({{ $post->preview_image->url }});"></div>
    <div class="Tease-logo" style="background:url({{ $post->logo_image->url }});"></div>
    <span class="sr-only">{{ $post->post_title }}</span>
  </a>
</article>
