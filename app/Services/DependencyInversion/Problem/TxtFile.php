<?php

namespace App\Services\DependencyInversion\Problem;

use Illuminate\Support\Facades\Storage;

class TxtFile
{
    public const FILE_TYPE = '.txt';

    public function read(string $fileName): string
    {
        return Storage::get($fileName . self::FILE_TYPE);
    }

    public function write(string $fileName, string $content): bool
    {
        return Storage::put($fileName . self::FILE_TYPE, $content);
    }
}
