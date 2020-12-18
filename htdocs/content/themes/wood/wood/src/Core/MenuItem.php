<?php

namespace Wood\Core;

use TimberMenuItem;

class MenuItem extends TimberMenuItem
{
    public $PostClass = 'Wood\PostTypes\Post';

    public $listItemClass = 'menu-item';

    public function __construct($data)
    {
        parent::__construct($data);

        // Add a modifier class if the item is the current page
        if ($data->current) {
            $this->add_class($this->listItemClass.'--current');
        }
    }
}
