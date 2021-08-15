<?php

namespace LaraZeus\Core\Classes\Hooks;

interface Hooks
{
    public function preShow($form);

    public function display($form): string;

    public function preStore($form);

    public function store($form);

    public function postStore($form);
}
