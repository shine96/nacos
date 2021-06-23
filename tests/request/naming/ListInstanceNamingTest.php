<?php

namespace tests\request\naming;

use tests\TestCase;
use ReflectionException;
use mimic\nacos\model\InstanceList;
use mimic\nacos\request\naming\ListInstanceNaming;
use mimic\nacos\exception\ResponseCodeErrorException;
use mimic\nacos\exception\RequestUriRequiredException;
use mimic\nacos\exception\RequestVerbRequiredException;

class RegisterInstanceDiscoveryTest extends TestCase
{

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testDoRequest()
    {
        $listInstanceDiscovery = new ListInstanceNaming();
        $listInstanceDiscovery->setServiceName("nacos.test.1");
        $listInstanceDiscovery->setNamespaceId("");
        $listInstanceDiscovery->setClusters("");
        $listInstanceDiscovery->setHealthyOnly(false);

        $response = $listInstanceDiscovery->doRequest();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getBody());
        $content = $response->getBody()->getContents();
        echo "content: " . $content;
        $this->assertNotEmpty($content);

        var_dump(InstanceList::decode($content));
        var_dump(InstanceList::decode($content)->getHosts());
    }
}
