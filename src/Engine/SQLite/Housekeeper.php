<?php

namespace nostriphant\Stores\Engine\SQLite;

readonly class Housekeeper implements \nostriphant\Stores\Housekeeper {

    public function __construct(private \nostriphant\Stores\Engine\SQLite $store) {
        
    }

    public function __invoke(\nostriphant\Stores\Conditions $whitelist_conditions): void {
        $select_statement = $this->store->query($whitelist_conditions, null, "event.id");
        $statement = Statement::nest("DELETE FROM event WHERE event.id NOT IN (", $select_statement, ") RETURNING *");
        $statement($this->store->database);
    }
}
