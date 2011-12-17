<?php

namespace Ddeboer\Salesforce\MapperBundle\Cache;

use Doctrine\Common\Cache\Cache;

class FileCache implements Cache
{
    private $dir;

    public function __construct($dir)
    {
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        if (!is_writable($dir)) {
            throw new \InvalidArgumentException(sprintf('The directory "%s" is not writable.', $dir));
        }

        $this->dir = rtrim($dir, '\\/');

    }

    public function fetch($id)
    {
        if ($this->contains($id)) {
            return unserialize(file_get_contents($this->getFilenameFromId($id)));
        }
    }

    public function contains($id)
    {
        return is_readable($this->getFilenameFromId($id));
    }

    public function save($id, $data, $lifeTime = 0)
    {
        file_put_contents($this->getFilenameFromId($id), serialize($data));
    }

    public function delete($id)
    {
        if ($this->contains($id)) {
            unlink($this->getFilenameFromId($id));
        }
    }

    public function getStats()
    {

    }

    private function getFilenameFromId($id)
    {
        return $this->dir . '/' . md5($id);
    }
}