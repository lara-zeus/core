<?php

namespace LaraZeus\Core\Concerns;

use Closure;

trait HasNavigationBadges
{
    protected Closure | bool $showNavigationBadges = true;

    protected array $showNavigationBadgesArray = [];

    public function hideNavigationBadges(Closure | bool $show = false, ?string $resource = null): static
    {
        return $this->setShowNavigationBadges($show, $resource);
    }

    public function showNavigationBadges(Closure | bool $show = true, ?string $resource = null): static
    {
        return $this->setShowNavigationBadges($show, $resource);
    }

    private function setShowNavigationBadges(Closure | bool $show = true, ?string $resource = null): static
    {
        if ($resource !== null) {
            $this->showNavigationBadgesArray[$resource] = $show;
        } else {
            $this->showNavigationBadges = $show;
        }

        return $this;
    }

    public function getShowNavigationBadges(?string $resource = null): bool
    {
        if ($resource !== null) {
            return $this->showNavigationBadgesArray[$resource] ?? $this->evaluate($this->showNavigationBadges);
        }

        return $this->evaluate($this->showNavigationBadges);
    }

    public static function getNavigationBadgesVisibility(?string $resource = null): bool
    {
        return (new static)::get()->getShowNavigationBadges($resource);
    }
}
