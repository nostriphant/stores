<?php

namespace nostriphant\Stores\Engine\SQLite\Condition;

readonly class Scalar {

    public function __construct(private string $event_field, private array $expected_value) {
        
    }

    
    public function __invoke(): array {
        $positionals = array_fill(0, count($this->expected_value), '?');
        return array_merge(["event.{$this->event_field} IN (" . implode(', ', $positionals) . ")"], $this->expected_value);
    }
}
