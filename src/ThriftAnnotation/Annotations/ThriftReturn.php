<?php // zhangwei@dankegongyu.com

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * @Annotation
 * @Target("METHOD")
 */
class ThriftReturn implements ThriftDefinition
{
    /**
     * @Required()
     */
    public $type;
}
