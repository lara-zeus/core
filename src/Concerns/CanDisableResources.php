<?php

namespace LaraZeus\Core\Concerns;

trait CanDisableResources
{
    protected array $disabledResources = [];

    public function disableResources(array $resources): static
    {
        $this->disabledResources = $resources;

        return $this;
    }

    public function getDisabledResources(): ?array
    {
        return $this->disabledResources;
    }
}
