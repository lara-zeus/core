<?php

namespace LaraZeus\Core\Concerns;

use Closure;

trait HasModels
{
    protected array $models = [];

    public function models(array $models): static
    {
        $this->models = $models;

        return $this;
    }

    public function getModels(): array
    {
        return $this->models;
    }

    public static function getModel(string $model): string
    {
        return array_merge(
            self::getDefaultModelsToMerge(),
            (new static())::get()->getModels()
        )[$model];
    }
}
