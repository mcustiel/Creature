<?php
namespace Mcustiel\Creature;

class CallbackCreator implements CreatorInterface
{
    private $creator;

    public function __construct(callable $creator)
    {
        $this->creator = $creator;
    }

    public function getInstance()
    {
        $function = $this->creator;
        return $function();
    }
}
