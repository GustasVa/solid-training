<?php

namespace App\Services\DependencyInversion\Solution;

class Writer
{
    private FileTypeInterface $file;

    public function __construct(FileTypeInterface $file)
    {
        $this->file = $file;
    }

    public function write(string $fileName, string $content): bool
    {
        return $this->file->write($fileName, $content);
    }
}
