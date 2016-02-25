<?php
namespace Mcustiel\Creature;

class SingletonLazyCreator extends LazyCreator implements CreatorInterface
{
    use Singleton;

    public function getInstance()
    {
        if ($this->instanceIsUnset()) {
            $this->instance = parent::getInstance();
        }
        return $this->instance;
    }
}
