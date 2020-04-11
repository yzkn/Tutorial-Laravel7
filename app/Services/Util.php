<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;

class Util
{
    public static function GUID()
    {
        Log::debug('Util '.__FUNCTION__.'()');

        $generated = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        Log::debug('$generated: '.$generated);

        return $generated;
    }

    public static function is_picture($path)
    {
        Log::debug('Util '.__FUNCTION__.'()');
        Log::debug('$path: '.$path);

        if($type = exif_imagetype($path)){
            Log::debug('$type: '.$type);
            switch($type){
                case IMAGETYPE_GIF:
                case IMAGETYPE_JPEG:
                case IMAGETYPE_PNG:
                    return true;
                default:
                    return false;
            }
        }
    }

    public static function urlsafe_b64encode($string) {
        Log::debug('Util '.__FUNCTION__.'()');
        Log::debug('$string: '.$string);

        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        Log::debug('$data: '.$data);

        return $data;
    }

    public static function urlsafe_b64decode($string) {
        Log::debug('Util '.__FUNCTION__.'()');
        Log::debug('$string: '.$string);

        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        $decoded = base64_decode($data);
        Log::debug('$decoded: '.$decoded);

        return $decoded;
    }
}