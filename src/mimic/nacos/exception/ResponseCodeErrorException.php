<?php

namespace mimic\nacos\exception;

use Exception;

/**
 * Class ResponseCodeErrorException
 * @author suxiaolin
 * @package mimic\nacos\exception
 */
class ResponseCodeErrorException extends Exception
{
    /**
     * ResponseCodeErrorException constructor.
     * @param int $code
     * @param string $message
     */
    public function __construct($code = 0, $message = "")
    {
        parent::__construct($message, $code);
    }
}