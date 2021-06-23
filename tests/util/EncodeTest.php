<?php

namespace tests\util;


use tests\TestCase;
use mimic\nacos\util\EncodeUtil;

/**
 * Class EncodeTest
 * @author suxiaolin
 * @package tests\util
 */
class EncodeTest extends TestCase
{
    public function testOneEncode()
    {
        $this->assertNotEmpty(EncodeUtil::oneEncode());
    }

    public function testTwoEncode()
    {
        $this->assertNotEmpty(EncodeUtil::twoEncode());
    }
}
