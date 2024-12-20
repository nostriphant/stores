<?php

namespace nostriphant\Stores;

interface Housekeeper {
    public function __invoke(Conditions $whitelist_conditions): void;
}
