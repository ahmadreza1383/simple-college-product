<?php
namespace Services\Remove;

class File extends ChainCall
{
    protected function exists($path)
    {
        return (file_exists($path)) ? true : false;
    }

    protected function remove($path)
    {
        return ($this->exists($path)) ? unlink($path) : false;
    }
}