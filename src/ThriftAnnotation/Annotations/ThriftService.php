<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("CLASS")
 */
class ThriftService implements ThriftDefinition
{
    /**
     * @var string
     */
    public $name;
}
