<?php

namespace App\Http\Controllers\DependencyInversion\Solution;

use App\Http\Controllers\Controller;
use App\Services\DependencyInversion\Solution\Reader;
use App\Services\DependencyInversion\Solution\TxtFile;
use App\Services\DependencyInversion\Solution\Writer;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Now we can implement as many file types as
     * we want and get then using Open Close principle.
     */
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
