<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests\Example;

use Zhwei\ThriftAnnotation\Annotations\ThriftMethodParam;
use Zhwei\ThriftAnnotation\Annotations\ThriftMethodReturn;
use Zhwei\ThriftAnnotation\Annotations\ThriftNamespace;
use Zhwei\ThriftAnnotation\Annotations\ThriftReturn;
use Zhwei\ThriftAnnotation\Annotations\ThriftThrows;
use Zhwei\ThriftAnnotation\Annotations\ThriftParamItem;
use Zhwei\ThriftAnnotation\Annotations\ThriftParams;
use Zhwei\ThriftAnnotation\Annotations\ThriftService;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeString;

/**
 * Interface InterfaceExample
 * @package Zhwei\ThriftAnnotationTests\Example
 *
 * @ThriftService()
 * @ThriftNamespace(lang="java", namespace="in.zhw.tests")
 */
interface InterfaceExample
{
    /**
     * @ThriftParams({
     *     @ThriftParamItem(id=1, name="name", type=@ThriftTypeString()),
     *     @ThriftParamItem(id=2, name="world", type=@ThriftTypeString()),
     * })
     *
     * @ThriftReturn(@ThriftTypeString())
     * @ThriftThrows(id=1, type=ExceptionExample::class)
     */
    public function hello($name);

    /**
     * @ThriftReturn(StructExample::class)
     */
    public function returnStruct();
}
