<?php

$timber = new \Timber\Timber();

Timber::$dirname = [
    'resources/views',
    'resources/views/templates',
];

require_once('data/acf-export.php');

require_once('wood/bootstrap.php');
