<?php

namespace mimic\nacos\request\config;

/**
 * Class DeleteConfigRequest
 * @author suxiaolin
 * @package mimic\nacos\request\config
 */
class DeleteConfigRequest extends ConfigRequest
{
    protected $uri = "/nacos/v1/cs/configs";
    protected $verb = "DELETE";
}