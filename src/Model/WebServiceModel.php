<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use Psr\Http\Message\ResponseInterface;

class WebServiceModel extends Model
{
    protected WebService $adapter;

    public function __construct(WebService $auth)
    {
        $this->adapter = $auth;
    }

    public function request(string $method, string $uri, array $data = [], array $headers = []): ResponseInterface
    {
        $response = $this->adapter->client->request($method, $uri, [
            "base_uri" => $this->adapter->getBaseUri() . "WebService/",
            "headers" => [
                "Authorization" => "Bearer " . $this->adapter->getAccessToken(),
            ],
            "query" => [
                "npsn" => $this->adapter->npsn,
            ]
        ]);

        $this->checkError($response);

        return $response;
    }
}