<?php

namespace AAbutton\Esign\Tests\Unit;

use AAbutton\Esign\factory\Factory;
use AAbutton\Esign\Tests\TestCase;

class FactoryTest extends TestCase
{
    public function test_can_set_host()
    {
        Factory::setHost('https://foo.bar');
        $this->assertEquals('https://foo.bar', Factory::getHost());
    }

    public function test_can_set_debug()
    {
        Factory::setDebug(true);
        $this->assertTrue(Factory::getDebug());
    }

    public function test_can_get_project_id()
    {
        $this->assertEquals('foo', Factory::getProjectId());
    }

    public function test_can_get_project_secret()
    {
        $this->assertEquals('bar', Factory::getProjectScert());
    }
}
