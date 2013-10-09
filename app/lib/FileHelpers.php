<?php namespace Wq\IO;

trait FileHelpers {

    public function openFile($filename) {
        $repositories = __DIR__;
        $fpath = "{$repositories}/../../data/{$filename}";
        return fopen($fpath, 'r');
    }

}