<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests\Example;

use Zhwei\ThriftAnnotation\Annotations\ThriftException;
use Zhwei\ThriftAnnotation\Annotations\ThriftProperty;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeInt32;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;

/**
 * Class ExceptionExample
 * @package Zhwei\ThriftAnnotationTests\Example
 *
 * @ThriftException()
 */
class ExceptionExample extends \Exception
{
    /**
     * @ThriftProperty(id=1, type=@ThriftTypeInt32())
     */
    protected $code;

    /**
     * @ThriftProperty(id=2, type=@ThriftTypeString())
     */
    protected $message;
}
