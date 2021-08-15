<?php

namespace LaraZeus\Core\Classes\Fields\Classes;

use LaraZeus\Core\Classes\Fields\FieldsContract;

class Text extends FieldsContract
{
    public $disabled = false;

    public function __construct()
    {
        $this->definition = [
            'type' => 'text',
            'title' => 'Text',
            'icon' => 'fa-text-width',
            'order' => 1,
        ];
    }
}

