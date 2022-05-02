<?php

namespace App\Services\DependencyInversion\Problem;


class Reader
{
    private TxtFile $file;

    public function __construct(TxtFile $file)
    {
        $this->file = $file;
    }

    public function read(string $fileName): string
    {
        return $this->file->read($fileName);
    }
}
