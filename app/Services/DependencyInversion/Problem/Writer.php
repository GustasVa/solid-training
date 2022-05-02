<?php

namespace App\Services\DependencyInversion\Problem;

class Writer
{
    private TxtFile $file;

    public function __construct(TxtFile $file)
    {
        $this->file = $file;
    }

    public function write(string $fileName, string $content): bool
    {
        return $this->file->write($fileName, $content);
    }
}
