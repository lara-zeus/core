<?php

namespace LaraZeus\Core\Concerns;

trait CanHideResources
{
    protected array $hideResources = [];

    public function hideResources(array $resources): static
    {
        $this->hideResources = $resources;

        return $this;
    }

    public function getHiddenResources(): ?array
    {
        return $this->hideResources;
    }
}
