<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests\Example;

use Zhwei\ThriftAnnotation\Annotations\ThriftProperty;
use Zhwei\ThriftAnnotation\Annotations\ThriftStruct;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;

/**
 * Class StructExample2
 * @package Zhwei\ThriftAnnotationTests\Example
 *
 * @ThriftStruct()
 */
class StructExample2
{
    /**
     * @ThriftProperty(id=1, type=@ThriftTypeString())
     * @var string
     */
    protected $name;
}
