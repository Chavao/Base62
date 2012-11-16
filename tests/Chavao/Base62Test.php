<?php
namespace Chavao;

class Base62Test extends \PHPUnit_Framework_TestCase
{

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($class = 'Chavao\Base62'),
            'Class not found: '.$class
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEncodeWithoutParameterShouldThrownAnException()
    {
        $base62 = new Base62();
        $base62->encode();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testDecodeWithoutParameterShouldThrownAnException()
    {
        $base62 = new Base62();
        $base62->decode();
    }

    public function testEncodeShouldReturnABase62Value()
    {
        $base62 = new Base62();

        $this->assertEquals($base62->encode(15), 'f');
        $this->assertEquals($base62->encode(50), 'O');
        $this->assertEquals($base62->encode(71), '19');
        $this->assertEquals($base62->encode(90), '1s');
    }

    public function testDecodeShouldReturnABase10Value()
    {
        $base62 = new Base62();

        $this->assertEquals($base62->decode('f'), 15);
        $this->assertEquals($base62->decode('O'), 50);
        $this->assertEquals($base62->decode('19'), 71);
        $this->assertEquals($base62->decode('1s'), 90);
    }
}
