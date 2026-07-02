<?php
namespace Pest;

use \nostriphant\NIP01\Event;

function event(array $event): Event {
    return new Event(...array_merge([
                'id' => '',
                'pubkey' => '',
                'created_at' => time(),
                'kind' => 1,
                'content' => 'Hello World',
                'sig' => '',
                'tags' => []
                    ], $event));
}
