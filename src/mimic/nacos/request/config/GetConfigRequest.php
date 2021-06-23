<?php

namespace mimic\nacos\request\config;

/**
 * Class GetConfigRequest
 * @author suxiaolin
 * @package mimic\nacos\request\config
 */
class GetConfigRequest extends ConfigRequest
{
    protected $uri = "/nacos/v1/cs/configs";
    protected $verb = "GET";

}