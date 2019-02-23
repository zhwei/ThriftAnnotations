<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Zhwei\ThriftAnnotation\Annotations\ThriftDefinition;
use Zhwei\ThriftAnnotation\Annotations\ThriftNamespace;
use Zhwei\ThriftAnnotation\Annotations\ThriftParams;
use Zhwei\ThriftAnnotation\Annotations\ThriftProperty;
use Zhwei\ThriftAnnotation\Annotations\ThriftReturn;
use Zhwei\ThriftAnnotation\Annotations\ThriftService;
use Zhwei\ThriftAnnotation\Annotations\ThriftThrows;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftType;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeList;
use Zhwei\ThriftAnnotation\Annotations\Types\ThriftTypeMap;
use Zhwei\ThriftAnnotation\Exception\ThriftAnnotationException;

class Reader
{
    /**
     * @var array
     */
    protected $interfaces = [];

    protected $result = [
        'services' => [],
        'structs' => [],
        'exceptions' => [],
    ];

    /**
     * @var AnnotationReader
     */
    protected $reader;

    public function __construct()
    {
        $this->reader = new AnnotationReader();
    }

    public function setInterfaces(array $interfaces)
    {
        $this->interfaces = $interfaces;
        return $this;
    }

    public function read()
    {
        foreach ($this->interfaces as $interface) {
            $this->readInterface($interface);
        }
        return $this->result;
    }

    protected function readInterface($interface)
    {
        $rfc = new \ReflectionClass($interface);

        $annotations = $this->reader->getClassAnnotations($rfc);
        /** @var ThriftService $serviceAnnotation */
        $serviceAnnotation = $this->getFirstAnnotationByClass($annotations, ThriftService::class);
        if (!$serviceAnnotation) {
            throw new ThriftAnnotationException($interface . ' does not found ThriftService Annotation.');
        }
        $serviceName = $serviceAnnotation->name ?: $rfc->getShortName();
        $namespaces = $this->getNamespacesFromAnnotations($annotations, $rfc);

        // 函数
        $methods = [];
        foreach ($rfc->getMethods() as $method) {
            $methods[$method->getName()] = $this->readMethod($method);
        }

        $this->result['services'][$interface] = [
            'name' => $serviceName,
            'namespaces' => $namespaces,
            'methods' => $methods,
        ];
    }

    protected function readMethod(\ReflectionMethod $method)
    {
        $params = [];
        $return = null;
        $throws = [];

        $annotations = $this->reader->getMethodAnnotations($method);
        foreach ($annotations as $annotation) {
            if ($annotation instanceof ThriftParams) {
                $params = $annotation->values;
            } elseif ($annotation instanceof ThriftReturn) {
                $return = $annotation->type;
            } elseif ($annotation instanceof ThriftThrows) {
                if (!$annotation->name) {
                    $annotation->name = "e{$annotation->id}";
                }
                $throws[] = $annotation;
            }
        }

        // 解析依赖的类型
        foreach ($params as $param) {
            $this->readThriftType($param->type);
        }
        foreach ($throws as $throw) {
            $this->readThriftType($throw->type, true);
        }
        $this->readThriftType($return);

        return [
            'params' => $params,
            'return' => $return,
            'throws' => $throws,
        ];
    }

    /**
     * 从注解中解析命名空间
     *
     * @param ThriftDefinition[]|ThriftNamespace[] $annotations
     * @param \ReflectionClass $rfc
     * @return array
     */
    protected function getNamespacesFromAnnotations($annotations, \ReflectionClass $rfc)
    {
        $namespaces = [];

        foreach ($annotations as $annotation) {
            if ($annotation instanceof ThriftNamespace) {
                $namespaces[$annotation->lang] = $annotation->namespace;
            }
        }

        if (!isset($namespaces['php'])) {
            $namespaces['php'] = str_replace('\\', '.', $rfc->getNamespaceName());
        }

        return $namespaces;
    }

    /**
     * 获取注解列表中第一个指定类型的注解
     *
     * @param ThriftDefinition[] $annotations
     * @param $class
     * @return ThriftDefinition|null
     */
    protected function getFirstAnnotationByClass($annotations, $class)
    {
        foreach ($annotations as $annotation) {
            if ($annotation instanceof $class) {
                return $annotation;
            }
        }

        return null;
    }

    /**
     * @param ThriftType|string
     * @param bool $isException
     */
    protected function readThriftType($type, $isException = false)
    {
        switch (true) {
            case $type instanceof ThriftTypeList:
                $this->readThriftType($type->elementType);
                return;

            case $type instanceof ThriftTypeMap:
                $this->readThriftType($type->keyType);
                $this->readThriftType($type->valueType);
                return;

            case is_string($type) && class_exists($type):
                $this->readStruct($type, $isException);
                return;
        }
    }

    protected function readStruct($class, $isException = false)
    {
        $key = $isException ? 'exceptions' : 'structs';

        // 避免重复解析
        if (isset($this->result[$key][$class])) {
            return;
        }

        $rfc = new \ReflectionClass($class);
        $annotations = $this->reader->getClassAnnotations($rfc);
        $namespaces = $this->getNamespacesFromAnnotations($annotations, $rfc);

        $properties = [];
        foreach ($rfc->getProperties() as $property) {
            /** @var ThriftProperty $annotation */
            $annotation = $this->reader->getPropertyAnnotation($property, ThriftProperty::class);
            if ($annotation) {
                if (!$annotation->name) {
                    $annotation->name = $property->getName();
                }
                $properties[$property->getName()] = $annotation;

                $this->readThriftType($annotation->type); // 解析依赖的类型
            }
        }

        $this->result[$key][$class] = [
            'name' => $rfc->getShortName(),
            'namespaces' => $namespaces,
            'properties' => $properties,
        ];
    }
}
