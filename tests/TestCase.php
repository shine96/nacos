<?php


namespace tests;


use mimic\nacos\NacosConfig;

/**
 * Class TestCase
 * @author suxiaolin
 * @package tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp() : void/* The :void return type declaration that should be here would cause a BC issue */
    {
        NacosConfig::setHost("http://127.0.0.1:8848/");
        NacosConfig::setIsDebug(true);
    }
}