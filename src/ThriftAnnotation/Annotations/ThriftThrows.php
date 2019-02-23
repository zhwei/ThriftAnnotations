<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class ThriftThrows
 * @package Zhwei\ThriftAnnotation\Annotations
 *
 * @Annotation
 * @Target("METHOD")
 */
class ThriftThrows implements ThriftDefinition
{
    /**
     * @Required()
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
}
