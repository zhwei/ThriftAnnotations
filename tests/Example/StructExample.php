<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests\Example;

use Zhwei\ThriftAnnotation\Annotations\ThriftProperty;
use Zhwei\ThriftAnnotation\Annotations\ThriftStruct;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeInt64;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeInt8;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeList;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeMap;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;

/**
 * Class StructExample
 * @package Zhwei\ThriftAnnotationTests\Example
 *
 * @ThriftStruct()
 */
class StructExample
{
    /**
     * @ThriftProperty(id=1, type=@ThriftTypeString())
     * @var string
     */
    public $name;

    /**
     * @ThriftProperty(id=2, type=@ThriftTypeString())
     * @var string
     */
    public $color;

    /**
     * @ThriftProperty(id=3, type=@ThriftTypeInt8())
     * @var int
     */
    public $age;

    /**
     * @ThriftProperty(
     *     id=4,
     *     type=@ThriftTypeList(StructExample2::class),
     * )
     */
    public $children;

    /**
     * @ThriftProperty(
     *     id=5,
     *     type=@ThriftTypeMap(
     *          keyType=@ThriftTypeInt64(),
     *          valueType=@ThriftTypeList(StructExample2::class)
     *     )
     * )
     */
    public $childrenMap;
}
