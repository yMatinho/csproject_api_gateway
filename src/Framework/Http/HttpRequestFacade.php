<?php

namespace Framework\Http;

use CurlHandle;
use Framework\Singleton\Router\HttpDefaultCodes;
use Framework\Singleton\Router\HttpMethods;

class HttpRequestFacade
{

    public function request(string $method, string $url, array $body = []): object
    {
        $curl = curl_init();
        $this->setCurlDefaultConfiguration($curl, $method, $url);
        $this->setCurlBody($curl, $body);

        $data = curl_exec($curl);
        if(!$this->isJson($data))
            throw new \Exception("Unknown error when making HTTP request");
        $response = json_decode($data);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($statusCode != HttpDefaultCodes::SUCCESS) {
            throw new \Exception(!empty($response->message) ?
                $response->message : $response);
        }
        $response->statusCode = $statusCode;

        return $response;
    }

    private function isJson(string $data): bool {
        return json_decode($data) !== null ? true : false;
    }

    private function setCurlDefaultConfiguration(CurlHandle &$curl, string $method, string $url): void
    {
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    }

    private function setCurlBody(CurlHandle &$curl, array $body): void
    {
        if ($body) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        }
    }
}
