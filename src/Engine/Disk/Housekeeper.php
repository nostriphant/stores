<?php

namespace nostriphant\Stores\Engine\Disk;

use nostriphant\Stores\Engine\Disk;
use nostriphant\NIP01\Event;

readonly class Housekeeper implements \nostriphant\Stores\Housekeeper {

    public function __construct(private Disk $store) {
        
    }

    public function __invoke(\nostriphant\Stores\Conditions $whitelist_conditions): void {
        $whitelist = \nostriphant\Stores\Engine\Memory\Condition::makeConditions($whitelist_conditions);
        Disk::walk_store($this->store->store, function (Event $event) use ($whitelist) {
            if (call_user_func($whitelist, $event) !== false) {
                return true;
            }

            unset($this->store[$event->id]);
            return false;
        });
    }
}
