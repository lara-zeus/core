<?php

namespace LaraZeus\Core\Concerns;

use Closure;

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
