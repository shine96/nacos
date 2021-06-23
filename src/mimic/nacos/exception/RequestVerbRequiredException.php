<?php


namespace mimic\nacos\exception;


use Exception;

/**
 * Class RequestVerbRequiredException
 * @author suxiaolin
 * @package mimic\nacos\exception
 */
class RequestVerbRequiredException extends Exception
{
    /**
     * RequestVerbRequiredException constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}