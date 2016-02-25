<?php
namespace Mcustiel\Creature\Unit;

use Mcustiel\Creature\LazyCreator;
use Mcustiel\Tests\Fixtures\Dummy;

class LazyCreatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldReturnAnInstanceOfTheSpecifiedClassWithArguments()
    {
        $creator = new LazyCreator(Dummy::class, ['potato', new Dummy('tomato')]);

        $dummy = $creator->getInstance();
        $this->assertInstanceOf(Dummy::class, $dummy);
        $this->assertEquals('potato', $dummy->getArg1());
        $this->assertInstanceOf(Dummy::class, $dummy->getArg2());
        $this->assertEquals('tomato', $dummy->getArg2()->getArg1());
    }

    /**
     * @test
     */
    public function shouldReturnAnInstanceOfTheSpecifiedClassWithOptionalArguments()
    {
        $creator = new LazyCreator(Dummy::class, ['potato']);

        $dummy = $creator->getInstance();
        $this->assertInstanceOf(Dummy::class, $dummy);
        $this->assertEquals('potato', $dummy->getArg1());
        $this->assertNull($dummy->getArg2());
    }
}
