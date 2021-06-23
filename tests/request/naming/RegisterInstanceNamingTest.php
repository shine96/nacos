<?php

namespace tests\request\naming;

use tests\TestCase;
use ReflectionException;
use mimic\nacos\exception\ResponseCodeErrorException;
use mimic\nacos\exception\RequestUriRequiredException;
use mimic\nacos\request\naming\RegisterInstanceNaming;
use mimic\nacos\exception\RequestVerbRequiredException;

class RegisterInstanceNamingTest extends TestCase
{

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testDoRequest()
    {
        $registerInstanceDiscovery = new RegisterInstanceNaming();
        $registerInstanceDiscovery->setIp("11.11.11.11");
        $registerInstanceDiscovery->setPort("8848");
        $registerInstanceDiscovery->setNamespaceId("");
        $registerInstanceDiscovery->setWeight(1.0);
        $registerInstanceDiscovery->setEnable(true);
        $registerInstanceDiscovery->setHealthy(true);
        $registerInstanceDiscovery->setMetadata('{"sn": 12345}');
        $registerInstanceDiscovery->setClusterName("");
        $registerInstanceDiscovery->setServiceName("nacos.test.1");

        $response = $registerInstanceDiscovery->doRequest();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getBody());
        $content = $response->getBody()->getContents();
        echo "content: " . $content;
        $this->assertNotEmpty($content);
        $this->assertTrue($content == "ok");
    }
}
