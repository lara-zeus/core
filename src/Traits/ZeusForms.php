<?php

namespace LaraZeus\Core\Traits;

use LaraZeus\Core\Models\Form;

trait ZeusForms
{
    public function forms()
    {
        return $this->hasMany(Form::class, 'author');
    }
}
