<?php
namespace App\Helpers;

class AppHelper {
    public static function indo_day($index){
        $days = [
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        if(isset($days[$index])){
            return $days[$index];
        }

        return 'Jumat';
    }

    public static function api($url, $method, $contentType = 'application/json', $data = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => $method,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_HTTPHEADER      => array(
                'Content-Type: '.$contentType,
                'x-token: '.env('X_TOKEN')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}