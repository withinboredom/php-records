<?php

namespace Withinboredom;

abstract class Record {
    public function with(...$values): static {
        if(!empty($values) && array_is_list($values)) {
            throw new \InvalidArgumentException("Cannot use positional arguments with Record::with()");
        }
        return new static(...array_merge((array) $this, $values));
    }
}