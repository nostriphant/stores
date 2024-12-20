<?php

namespace nostriphant\Stores\Engine;

use nostriphant\NIP01\Event;
use nostriphant\Stores\Results;

trait MemoryWrapper {

    readonly private Memory $memory;

    public function __construct(array $events) {
        $this->memory = new Memory($events);
    }

    public function offsetSet(mixed $offset, mixed $event): void {
        $this->memory[$offset] = $event;
    }

    public function offsetUnset(mixed $offset): void {
        unset($this->memory[$offset]);
    }

    public function offsetExists(mixed $offset): bool {
        return isset($this->memory[$offset]);
    }

    public function offsetGet(mixed $offset): ?Event {
        return $this->memory[$offset];
    }

    public function __invoke(\nostriphant\Stores\Conditions $filter_conditions, ?int $limit): Results {
        return call_user_func($this->memory, $filter_conditions, $limit);
    }
}
