<div class="Block Block--{{ $block->css_class }} background-{{ $block->background_color ? $block->background_color : 'white' }}" id="Block-{{ $index }}">
  @if(isset($block->anchor_id))
  <a class="Block-anchor" id="{{ $block->anchor_id }}"></a>
  @endif
  @yield('block-content')
</div>
