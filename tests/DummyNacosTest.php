<?php

namespace mimic\nacos\request\config;


use mimic\nacos\Nacos;
use mimic\nacos\NacosConfig;
use PHPUnit\Framework\TestCase;

/**
 * Class DummyNacosTest
 * @author suxiaolin
 * @package mimic\nacos\request\config
 */
class DummyNacosTest extends TestCase
{
    public function testRunOnce()
    {
        $config = Nacos::init(
            "http://127.0.0.1:8848/",
            "dummy_dev",
            "DUMMY",
            "DUMMY_GROUP",
            ""
        )->runOnce();
        $this->assertEmpty($config);
    }

    public function testListener()
    {
        Nacos::init(
            "http://127.0.0.1:8848/",
            "dummy_dev",
            "DUMMY",
            "DUMMY_GROUP",
            ""
        )->listener();
    }

    /**
     * This method is called before each test.
     */
    protected function setUp() : void/* The :void return type declaration that should be here would cause a BC issue */
    {
        putenv("NACOS_ENV=local");

        NacosConfig::setIsDebug(true);
        // 长轮询10秒一次
        NacosConfig::setLongPullingTimeout(10000);
    }
}
