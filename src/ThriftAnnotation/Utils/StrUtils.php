<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation\Utils;

class StrUtils
{
    public static function classBasename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}
