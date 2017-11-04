<?php declare(strict_types = 1);

namespace src\Template;

interface Renderer
{
    public function render($template, $data = []) : string;
}