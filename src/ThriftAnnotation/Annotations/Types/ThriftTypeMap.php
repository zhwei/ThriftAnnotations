<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations\Types;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * @Annotation
 * @Target({"ANNOTATION", "PROPERTY", "METHOD"})
 */
class ThriftTypeMap implements ThriftType
{
    /**
     * @Required()
     */
    public $keyType;

    /**
     * @Required()
     */
    public $valueType;
}
