<?php

namespace App\Http\Controllers\DependencyInversion\Problem;

use App\Http\Controllers\Controller;
use App\Services\DependencyInversion\Problem\Reader;
use App\Services\DependencyInversion\Problem\TxtFile;
use App\Services\DependencyInversion\Problem\Writer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function read(Request $request)
    {
        $file = $request->get('file');

        $txtFile = new TxtFile();
        $reader = new Reader($txtFile);

        return $reader->read($file);
    }

    public function write(Request $request)
    {
        $file = $request->get('file');
        $content = $request->get('content');

        $txtFile = new TxtFile();
        $writer = new Writer($txtFile);

        return $writer->write($file, $content);
    }
}
