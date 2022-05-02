<?php

namespace App\Services\DependencyInversion\Solution;

interface FileTypeInterface
{
    public function read(string $fileName): string;

    public function write(string $fileName, string $content): bool;
}
