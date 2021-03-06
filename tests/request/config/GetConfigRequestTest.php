<?php

namespace tests\request;

use tests\TestCase;
use ReflectionException;
use mimic\nacos\request\config\GetConfigRequest;
use mimic\nacos\exception\ResponseCodeErrorException;
use mimic\nacos\exception\RequestUriRequiredException;
use mimic\nacos\exception\RequestVerbRequiredException;

/**
 * Class GetConfigRequestTest
 * @author suxiaolin
 * @package tests\request
 */
class GetConfigRequestTest extends TestCase
{
    /**
     * @throws ReflectionException
     * @throws RequestUriRequiredException
     * @throws RequestVerbRequiredException
     * @throws ResponseCodeErrorException
     */
    public function testDoRequest()
    {
        $getConfigRequest = new GetConfigRequest();
        $getConfigRequest->setDataId("LARAVEL");
        $getConfigRequest->setGroup("DEFAULT_GROUP");

        $response = $getConfigRequest->doRequest();
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->getBody());
        $content = $response->getBody()->getContents();
        echo "md5: " . md5($content);
        $this->assertEquals(md5($content), "d10d54edbdf4c99f6bbab4ef69292046");
        file_put_contents("env-example", $content);
    }
}
