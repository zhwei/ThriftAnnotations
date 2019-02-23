<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Annotations;

use Doctrine\Common\Annotations\Annotation\Required;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Class ThriftNamespace
 * @package Zhwei\ThriftAnnotation\Annotations
 *
 * @Annotation
 * @Target("CLASS")
 */
class ThriftNamespace
{
    /**
     * 语言名称, eg: java, php
     *
     * @Required()
     * @var string
     */
    public $lang;

    /**
     * 命名空间名称，eg: com.danke.hello
     *
     * @Required()
     * @var string
     */
    public $namespace;
}
