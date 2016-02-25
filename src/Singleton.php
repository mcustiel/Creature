<?php
namespace Mcustiel\Creature;

trait Singleton
{
    private $instance;

    private function instanceIsUnset()
    {
        return $this->instance === null;
    }

    public function getInstance()
    {
        if ($this->instance === null) {
            $this->instance = parent::getInstance();
        }
        return $this->instance;
    }
}
