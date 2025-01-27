<?php

namespace nostriphant\Stores\Engine\SQLite\Condition;

readonly class Until {

    public function __construct(private int $expected_value) {
        
    }

    public function __invoke(): array {
        return ["event.created_at <= ?", $this->expected_value];
    }
}
