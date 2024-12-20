<?php

require_once __DIR__ . '/vendor/autoload.php';

define('ROOT_DIR', __DIR__);
is_dir(ROOT_DIR . '/data') || mkdir(ROOT_DIR . '/data');

define('STORES_VERSION', file_get_contents(__DIR__ . '/VERSION'));
