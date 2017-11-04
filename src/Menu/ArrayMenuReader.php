<?php declare(strict_types = 1);

namespace src\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu() : array
    {
        return [
            ['href' => '/', 'text' => 'Home'],
            ['href' => '/books', 'text' => 'Books'],
            ['href' => '/drawings', 'text' => 'Drawings'],
            ['href' => '/animation', 'text' => 'Animation'],
            ['href' => '/about', 'text' => 'About'],
            ['href' => '/page-one', 'text' => 'Page One'],
        ];
    }
}