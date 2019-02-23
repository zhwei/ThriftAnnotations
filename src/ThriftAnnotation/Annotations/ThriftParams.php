<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class ThriftParams
 * @package Zhwei\ThriftAnnotation\Annotations
 *
 * @Annotation
 * @Target("METHOD")
 */
class ThriftParams implements ThriftDefinition
{
    /**
     * @Required()
     * @var \Zhwei\ThriftAnnotation\Annotations\ThriftParamItem[]
     */
    public $values;
}
