<?php
/**
 * Created by PhpStorm.
 * User: lucian
 * Date: 09.05.2018
 * Time: 16:07
 */

namespace LucianOvidiuFilote\ValidationHelper;


class ValidationHelper
{
    public static function checkNumberOrDecimal($string)
    {
        if (preg_match('/[0-9]+(\.[0-9]{1,2})/', $string) === 0 && preg_match('/[0-9]+/', $string) === 0) {
            return false;
        }
        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    public static function checkHasUrl($string)
    {
        //Has url in value
        $hasUrl = preg_match('/http:|https:/', $string) === 1;
        //Has image link in value
        $isImage = self::checkHasImage($string);
        return $hasUrl && !$isImage;
    }

    /**
     * @param $string
     * @return bool
     */
    public static function checkHasImage($string)
    {
        return preg_match('/^(.*\.(jpg|gif|png|jpeg)).*/', $string) === 1;
    }


    /**
     * @param $string
     * @return bool
     */
    public static function checkHasMultipleUrls($string)
    {
        //Has urls in value
        return substr_count($string, 'http') >= 2;
    }
}