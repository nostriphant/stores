<?php

it('creates a store directory if not exists', function () {
    $transpher_store = ROOT_DIR . '/data/disktest_' . uniqid();
    expect($transpher_store)->not()->toBeDirectory();
    $store = new nostriphant\Stores\Engine\Disk($transpher_store, []);
    expect($transpher_store)->toBeDirectory();
});

