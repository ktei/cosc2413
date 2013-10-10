<?php namespace Wq\IO;

trait FileHelpers {

    public function openFile($filename, $mode = 'r') {
        $repositories = __DIR__;
        $fpath = "{$repositories}/../../data/{$filename}";
        return fopen($fpath, $mode);
    }

}