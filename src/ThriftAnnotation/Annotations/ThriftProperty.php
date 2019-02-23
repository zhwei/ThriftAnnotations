<?php // zhangwei@dankegongyu.com

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
class ThriftProperty implements ThriftDefinition
{
    /**
     * @Required()
     *
     * @var int
     */
    public $id;

    /**
     * @Required()
     */
    public $type;

    /**
     * @var string
     */
    public $name;

    /**
     * @var boolean
     */
    public $required = true;
}
