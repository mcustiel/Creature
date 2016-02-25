<?php
namespace Mcustiel\Creature;

class SingletonCallbackCreator extends CallbackCreator implements CreatorInterface
{
    use Singleton;

    public function getInstance()
    {
        if ($this->instanceIsUnset()) {
            $function = $this->creator;
            $this->instance = $function();
        }
        return $this->instance;
    }
}
