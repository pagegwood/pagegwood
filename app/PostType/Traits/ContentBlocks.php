<?php

namespace App\PostType\Traits;

use Illuminate\Support\Collection;
use App\Content\BlockResolver;

trait ContentBlocks
{
    public function getBlocksAttribute()
    {
        $blocks = get_field('wood_planks', $this->ID);

        if (is_array($blocks)) {
            $blockResolver = BlockResolver::make();

            foreach ($blocks as &$block) {
                $block = $blockResolver->resolve($block);
            }

            return Collection::make($blocks);
        }
    }

    public function hasBlocks()
    {
        return !is_null($this->blocks);
    }
}
