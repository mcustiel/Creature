<?php
namespace Mcustiel\Creature;

class LazyCreator implements CreatorInterface
{
    private $className;
    private $arguments = [];

    public function __construct($className, array $arguments = [])
    {
        $this->className = $className;
        $this->arguments = $arguments;
    }

    public function getInstance()
    {
        if (!class_exists($this->className)) {
            throw new \RuntimeException(
                'Error creating instance. Class does not exists: ' . $this->className
            );
        }
        // Yeah, yeah... I'm using eval... Just to support PHP 5.5, with 5.5 we could use ... operator
        return eval("return new \\{$this->className}(" . $this->argumentsArrayToArgumentsString() . ");");
    }

    public function argumentsArrayToArgumentsString()
    {
        return '$this->arguments[\''
            . implode('\'],$this->arguments[\'', array_keys($this->arguments))
            . '\']';
    }
}
