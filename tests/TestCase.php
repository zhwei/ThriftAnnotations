<?php // zhangwei@dankegongyu.com 

namespace Zhwei\ThriftAnnotationTests;

use Zhwei\ThriftAnnotation\ThriftAnnotationRegister;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        parent::setUp();

        ThriftAnnotationRegister::register();
    }
}
