<?php

namespace LaraZeus\Core\Classes\VCF;

interface Vcf
{
    public function render($field): string;

    public function showResponse($values,$ans): string;

    public function exportResponse($values): array;

    public function exportHeads(): array;
}
