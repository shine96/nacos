<?php


namespace mimic\nacos\exception;


use Exception;

/**
 * Class RequestUriRequiredException
 * @author suxiaolin
 * @package mimic\nacos\exception
 */
class RequestUriRequiredException extends Exception
{
    /**
     * RequestUriRequiredException constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
}