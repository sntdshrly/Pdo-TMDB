<?php
/**
 * @author Sherly Santiadi 2072025
 **/
class ConnectionUtil
{
    const API_KEY = '99a586faf1fb349fe3edfd0dab2681a8';
    const URL_FETCH_MOVIES = "https://api.themoviedb.org/3/movie/";
    public static function getMySQLConnection(){
        $link = new PDO('mysql:host=localhost;dbname=pwl20212uas','root','');
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $link;
    }

    public static function curl_get($url, array $get = NULL,
                                    array $options = array()) {
        $defaults = array(
            CURLOPT_URL => $url . (strpos($url, '?') === FALSE ? '?' : '') . http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        );

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if (!$result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}