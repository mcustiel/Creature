<?php
namespace Mcustiel\Creature\Unit;

use Mcustiel\Tests\Fixtures\Dummy;
use Mcustiel\Creature\SingletonCallbackCreator;

class SingletonCallbackCreatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnTheReturnValueFromTheCallback()
    {
        $callback = function () {
            return new Dummy(uniqid());
        };

        $creator = new SingletonCallbackCreator($callback);

        $value1 = $creator->getInstance();
        $this->assertInstanceOf(Dummy::class, $value1);
        $value2 = $creator->getInstance();
        $this->assertSame($value1, $value2);
        $this->assertEquals($value1->getArg1(), $value2->getArg1());
    }
}
