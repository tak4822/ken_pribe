<?php declare(strict_types = 1);

namespace src\Menu;

interface MenuReader
{
    public function readMenu() : array;
}