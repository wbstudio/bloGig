<?php
namespace App\Library;

use DateTime;

class Common
{
    static public function separateVerticalBar($string) {

        $rArray = null;

        if (isset($string)) {
            $rArray = explode('|', $string);
        }
        
        return $rArray;
    }

    static public function separateComma($string) {

        $rArray = null;

        if (isset($string)) {
            $rArray = explode(',', $string);
        }
        
        return $rArray;
    }

    public static function unlinkImage($filepath,$fileName)
    {
        $old_image = $filepath . $fileName;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
    }

    static public function dateConverter($string) {
        $ret = null;
        if (isset($string)) {
            $ret = substr($string, 0, 4) . '/' . substr($string, 5, 2) . '/' .substr($string, 8, 2);
        }        
        return $ret;
    }

    static public function newFlg($string) {
        $ret = false;
        $date = new DateTime();
        $threeDaysAgo = $date->modify('-3 days');
        $articleDate = new DateTime($string);
        if (isset($string) && ($threeDaysAgo < $articleDate)) {
            $ret = true;
        }
        return $ret;
    }

    static public function dateSplit($string, $type) {
        $ret = null;
        if (isset($string)) {
            $splitSpace = explode(' ', $string);
            $splitHyphen = explode('-', $splitSpace[0]);
            $splitColon = explode(':', $splitSpace[1]);

            $ret[$type . '_year'] = $splitHyphen[0];
            $ret[$type . '_month'] = $splitHyphen[1];
            $ret[$type . '_day'] = $splitHyphen[2];
            $ret[$type . '_hour'] = $splitColon[0];
            $ret[$type . '_minute'] = $splitColon[1];
        }        
        return $ret;
    }

}