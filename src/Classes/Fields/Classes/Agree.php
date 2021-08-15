<?php

namespace LaraZeus\Core\Classes\Fields\Classes;

use LaraZeus\Core\Classes\Fields\FieldsContract;

class Agree extends FieldsContract
{
    public $disabled = false;

    public function __construct()
    {
        $this->definition = [
            'type' => 'agree',
            'title' => 'Agree',
            'icon' => 'fa-thumbs-o-up',
            'settings_view' => null,
            'order' => 8,
        ];
    }

    public function showResponse($field, $ans): string
    {
        $out = '';
        if ($ans->response == 1) {
            $out .= trans('Frontend/App/Forms.agree');
        } else {
            $out .= $ans->response;
        }

        return $out;
    }
}
