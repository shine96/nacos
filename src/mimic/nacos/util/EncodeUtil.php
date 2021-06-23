<?php


namespace mimic\nacos\util;


/**
 * Class EncodeUtil
 * @author suxiaolin
 * @package mimic\nacos\util
 */
class EncodeUtil
{
    public static function twoEncode()
    {
        return pack("C*", 2);
    }

    public static function oneEncode()
    {
        return pack("C*", 1);
    }
}