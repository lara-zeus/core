<?php

namespace LaraZeus\Core\Concerns;

trait CanStickyActions
{
    protected bool $formActionsAreSticky = false;

    public function formActionsAreSticky(bool $condition = false): static
    {
        $this->formActionsAreSticky = $condition;

        return $this;
    }

    public function isFormActionsAreSticky(): bool
    {
        return $this->evaluate($this->formActionsAreSticky);
    }
}
