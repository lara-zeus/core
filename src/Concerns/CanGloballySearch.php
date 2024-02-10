<?php

namespace LaraZeus\Core\Concerns;

trait CanGloballySearch
{
    public function globallySearchableAttributes(array $label): static
    {
        $this->globallySearchableAttributes = $label;

        return $this;
    }

    public function getGloballySearchableAttributes(): array
    {
        return $this->globallySearchableAttributes;
    }

    public function getGlobalAttributes(string $class):array
    {
        return array_merge(
            (new static())::get()->defaultGloballySearchableAttributes,
            $this->globallySearchableAttributes
        )[$class];
    }
}
