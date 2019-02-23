<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class ThriftParamItem
 * @package Zhwei\ThriftAnnotation\Annotations
 *
 * @Annotation
 * @Target({"ANNOTATION", "METHOD"})
 */
class ThriftParamItem implements ThriftDefinition
{
    /**
     * @Required()
     * @var int
     */
    public $id;

    /**
     * @Required()
     * @var string
     */
    public $name;

    /**
     * @Required()
     */
    public $type;
}
