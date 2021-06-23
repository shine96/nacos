<?php

namespace tests\request\naming;

use tests\TestCase;
use ReflectionException;
use mimic\nacos\request\naming\BeatInstanceNaming;
use mimic\nacos\exception\ResponseCodeErrorException;
use mimic\nacos\exception\RequestUriRequiredException;
use mimic\nacos\exception\RequestVerbRequiredException;

class BeatInstanceNamingTest extends TestCase
{

    private $beat = '{"metadata":{},"instanceId":"11.11.11.11#8848#DEFAULT#nacos.test.1","port":8848,"service":"nacos.test.1","healthy":true,"ip":"11.11.11.11","clusterName":"DEFAULT","weight":1.0}';

    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testDoRequest()
    {
        $beatInstanceDiscovery = new BeatInstanceNaming();
        $beatInstanceDiscovery->setServiceName("nacos.test.1");
        $beatInstanceDiscovery->setBeat($this->beat);

        $response = $beatInstanceDiscovery->doRequest();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getBody());
        $content = $response->getBody()->getContents();
        echo "content: " . $content;
        $this->assertNotEmpty($content);
        $this->assertTrue($content ,json_encode('{"clientBeatInterval":5000}'));
    }
}
