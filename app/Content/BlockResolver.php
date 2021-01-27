<?php

namespace App\Content;

use Exception;

class BlockResolver
{
    public $blockFactory;

    public $blockTypeKey = 'acf_fc_layout';

    public $blockTypePrefix = 'wood_block_';

    public function __construct(BlockFactory $blockFactory)
    {
        $this->blockFactory = $blockFactory;
    }

    public function resolve(array $block)
    {
        $blockType = $this->getBlockType($block);

        return $this->createBlockInstance($blockType, $block);
    }

    protected function getBlockType(array $block)
    {
        if (array_key_exists($this->blockTypeKey, $block)) {
            $blockType = array_pull($block, $this->blockTypeKey);

            return $blockType;
        } else {
            throw new Exception("Block type key not found.");
        }
    }

    protected function createBlockInstance($blockType, $properties)
    {
        if (strpos($blockType, $this->blockTypePrefix) === 0) {
            $blockFactoryMethod = str_replace($this->blockTypePrefix, '', $blockType);

            $blockFactoryMethod = camel_case($blockFactoryMethod);

            return $this->blockFactory->$blockFactoryMethod($properties);
        } else {
            throw new Exception("Block instance could not created.");
        }
    }

    public static function make()
    {
        return new static(new BlockFactory);
    }
}
