<?php
namespace Mcustiel\Creature;

trait Singleton
{
    private $instance;

    private function instanceIsUnset()
    {
        return $this->instance === null;
    }
}
