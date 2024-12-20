<?php

namespace nostriphant\Stores\Engine\Memory;

use nostriphant\NIP01\Event;

readonly class Condition {

    public function __construct(private Event $event) {
        
    }

    public function __invoke(array $conditions): bool {
        return array_reduce($conditions, fn(bool $result, Condition\Test $condition) => $result && $condition($this->event), true);
    }

    static function makeConditions(\nostriphant\Stores\Conditions $conditionsFactory): callable {
        $conditions = $conditionsFactory(new \nostriphant\Stores\ConditionFactory(Condition\Test::class));
        return fn(Event $event): bool => array_reduce(array_map(new self($event), $conditions), fn(bool $result, bool $filter) => $result || $filter, false);
    }
}
