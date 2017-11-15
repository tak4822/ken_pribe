<?php declare(strict_types = 1);

namespace src\Template;

class BackendTwigRenderer implements BackendRenderer
{
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $data = []) : string
    {
//        $data = array_merge($data, [
//        ]);
        return $this->renderer->render($template, $data);
    }
}