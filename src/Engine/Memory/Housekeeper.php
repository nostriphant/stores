<?php

namespace nostriphant\Stores\Engine\Memory;

readonly class Housekeeper implements \nostriphant\Stores\Housekeeper {

    public function __construct(private \nostriphant\Stores\Engine\Memory $store) {
        
    }

    public function __invoke(\nostriphant\Stores\Conditions $whitelist_conditions): void {
        $whitelist = Condition::makeConditions($whitelist_conditions);
        foreach (\nostriphant\Stores\Store::query($this->store, []) as $event) {
            if (call_user_func($whitelist, $event) === false) {
                unset($this->store[$event->id]);
            }
        }
    }
}
