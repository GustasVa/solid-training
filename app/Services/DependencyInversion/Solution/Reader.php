<?php

namespace App\Services\DependencyInversion\Solution;


class Reader
{
    private FileTypeInterface $file;

    public function __construct(FileTypeInterface $file)
    {
        $this->file = $file;
    }

    public function read(string $fileName): string
    {
        return $this->file->read($fileName);
    }
}
