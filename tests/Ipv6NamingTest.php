<?php

namespace mimic\nacos\request\config;


use ReflectionException;
use mimic\nacos\Naming;
use mimic\nacos\model\Beat;
use mimic\nacos\NacosConfig;
use PHPUnit\Framework\TestCase;
use mimic\nacos\model\Instance;
use mimic\nacos\model\InstanceList;
use mimic\nacos\exception\ResponseCodeErrorException;
use mimic\nacos\exception\RequestUriRequiredException;
use mimic\nacos\exception\RequestVerbRequiredException;

/**
 * Class NamingTest
 * @author suxiaolin
 * @package mimic\nacos\request\config
 */
class NamingTest extends TestCase
{
    /**
     * @var Naming
     */
    private $discovery;

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testRegister()
    {
        $this->assertTrue($this->discovery->register());
    }

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testDelete()
    {
        $this->assertTrue($this->discovery->delete());
    }

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testUpdate()
    {
        while (true) {
            $this->assertTrue($this->discovery->update(0.8));
            echo "tiemstamp " . time();
            sleep(5);
        }
    }

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testListInstances()
    {
        $instanceList = $this->discovery->listInstances();
        $this->assertInstanceOf(InstanceList::class, $instanceList);
    }

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testGet()
    {
        $this->assertInstanceOf(Instance::class, $this->discovery->get());
    }

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testBeat()
    {
        while (true) {
            $beat = $this->discovery->beat($this->discovery->get());
            $this->assertInstanceOf(Beat::class, $beat);
            echo "tiemstamp " . time();
            sleep(5);
        }
    }

    /**
     * This method is called before each test.
     */
    protected function setUp() : void/* The :void return type declaration that should be here would cause a BC issue */
    {
        NacosConfig::setHost("http://127.0.0.1:8848/");
        NacosConfig::setIsDebug(true);
        // ?????????10?????????
        NacosConfig::setLongPullingTimeout(10000);
        $this->discovery = Naming::init(
            "nacos.test.1",
//            "2404:6800:8005::2e",
            "::1",
            "8848",
            "",
            "",
            false
        );
    }
}
