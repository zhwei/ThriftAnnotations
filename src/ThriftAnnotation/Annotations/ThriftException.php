<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

/**
 * @Annotation
 * @Target("CLASS")
 */
class ThriftException implements ThriftDefinition
{
    /**
     * @var string
     */
    public $name;
}
