<?php

namespace nostriphant\Stores;

use nostriphant\NIP01\Event;

interface Engine extends \ArrayAccess {

    public function __invoke(Conditions $filter_conditions, ?int $limit): Results;

    static function housekeeper(Engine $engine): Housekeeper;

    #[\ReturnTypeWillChange]
    #[\Override]
    public function offsetGet(mixed $offset): ?Event;
}
