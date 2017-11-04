<?php declare(strict_types = 1);

namespace src\Page;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}
