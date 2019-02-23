<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations\Types;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * @Annotation
 * @Target({"ANNOTATION", "PROPERTY"})
 */
class ThriftTypeList implements ThriftType
{
    /**
     * @Required()
     */
    public $elementType;
}
