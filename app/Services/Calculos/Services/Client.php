<?php
/**
 * Created by PhpStorm.
 * User: leandrorichard
 * Date: 04/07/18
 * Time: 17:05
 */

namespace App\Services\Calculos\Services;


class Client
{
    public static function send(array $param, string $url): \SimpleXMLElement
    {
        try {
            $parametros = http_build_query($param);
            $curl = curl_init($url . '?' . $parametros);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $dados = curl_exec($curl);
            return simplexml_load_string($dados);
        } catch (\Exception $e) {
            throw new $e;
        }
    }
}