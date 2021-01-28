@if ($page->hasBlocks())
  @foreach ($page->blocks as $index => $block)
    @include ($block->view, array('block' => $block, 'index' => $index))
  @endforeach
@endif
