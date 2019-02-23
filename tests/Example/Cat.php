<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests\Example;

use Zhwei\ThriftAnnotation\Annotations\ThriftMethodParam;
use Zhwei\ThriftAnnotation\Annotations\ThriftProperty;
use Zhwei\ThriftAnnotation\Annotations\ThriftStruct;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeInt8;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeList;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;

/**
 * Class Cat
 * @package Zhwei\ThriftAnnotationTests\Example
 *
 * @ThriftStruct()
 */
class Cat
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
     *     type=@ThriftTypeList(@ThriftTypeString()),
     * )
     */
    public $children;
}
