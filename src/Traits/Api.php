<?php
declare(strict_types=1);

namespace Apirone\Traits;

trait Api
{
    static $API_URL = "https://apirone.com/api/v2";

    private function post(string $url, array $params): array
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        $response = curl_exec($curl);
        curl_close($curl);
        if ($response) {
            return json_decode($response, true);
        }
        return [];
    }

    private function get(string $url): array
    {
        $response = file_get_contents($url);

        if ($response) {
            return json_decode($response, true);
        }
        return [];
    }

    private function getURL(string $endpoint, array $swapping = []): string
    {
        $url = self::$API_URL . $endpoint;
        if (empty($swapping)) {
            return $url;
        }

        return vsprintf($url, $swapping);
    }
}