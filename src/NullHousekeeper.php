<?php

namespace nostriphant\Stores;

class NullHousekeeper implements Housekeeper {

    public function __invoke(array $whitelist_prototypes): void {
        
    }
}
