<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation;

use Doctrine\Common\Annotations\AnnotationRegistry;

class ThriftAnnotationRegister
{
    public static function register()
    {
        $annotations = [
            Annotations\Types\ThriftTypeBool::class,
            Annotations\Types\ThriftTypeDouble::class,
            Annotations\Types\ThriftTypeInt8::class,
            Annotations\Types\ThriftTypeInt16::class,
            Annotations\Types\ThriftTypeInt32::class,
            Annotations\Types\ThriftTypeInt64::class,
            Annotations\Types\ThriftTypeList::class,
            Annotations\Types\ThriftTypeMap::class,
            Annotations\Types\ThriftTypeString::class,
            Annotations\Types\ThriftTypeUTF8::class,
            Annotations\Types\ThriftTypeUTF16::class,
            Annotations\Types\ThriftTypeVoid::class,

            Annotations\ThriftService::class,
            Annotations\ThriftNamespace::class,
            Annotations\ThriftStruct::class,
            Annotations\ThriftException::class,
            Annotations\ThriftParamItem::class,
            Annotations\ThriftParams::class,
            Annotations\ThriftProperty::class,
            Annotations\ThriftReturn::class,
            Annotations\ThriftThrows::class,
        ];

        foreach ($annotations as $annotation) {
            $rfc = new \ReflectionClass($annotation);
            $path = $rfc->getFileName();
            AnnotationRegistry::registerFile($path);
        }
    }
}
