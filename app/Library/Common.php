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
}