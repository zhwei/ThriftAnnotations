<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests;

use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeInt32;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;
use Zhwei\ThriftAnnotation\Reader;
use Zhwei\ThriftAnnotationTests\Example\ExceptionExample;
use Zhwei\ThriftAnnotationTests\Example\InterfaceExample;
use Zhwei\ThriftAnnotationTests\Example\StructExample;
use Zhwei\ThriftAnnotationTests\Example\StructExample2;

class ReaderTest extends TestCase
{
    public function testRead()
    {
        $reader = new Reader();
        $reader->setInterfaces([
            InterfaceExample::class,
        ]);
        $result = $reader->read();

        self::assertSame(
            [
                'java' => 'in.zhw.tests',
                'php' => 'Zhwei.ThriftAnnotationTests.Example',
            ],
            $result['services'][InterfaceExample::class]['namespaces']
        );

        self::assertSame(
            ['hello', 'returnStruct'],
            array_keys($result['services'][InterfaceExample::class]['methods'])
        );

        self::assertInstanceOf(
            ThriftTypeString::class,
            $result['services'][InterfaceExample::class]['methods']['hello']['return']
        );

        self::assertSame(
            [StructExample2::class, StructExample::class],
            array_keys($result['structs'])
        );

        self::assertSame(
            StructExample2::class,
            $result['structs'][StructExample::class]['properties']['childrenMap']->type->valueType->elementType
        );

        self::assertInstanceOf(
            ThriftTypeInt32::class,
            $result['exceptions'][ExceptionExample::class]['properties']['code']->type
        );
    }
}
