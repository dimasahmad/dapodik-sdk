<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model;

use DimasAhmad\Dapodik\SDK\Exceptions\JSONException;
use DimasAhmad\Dapodik\SDK\Exceptions\ResponseException;
use Psr\Http\Message\ResponseInterface;

class Model
{
    protected ?\stdClass $body;

    public function getBody(): ?\stdClass
    {
        return $this->body;
    }

    public function checkError(ResponseInterface $response): void
    {
        $content = $response->getBody()->getContents();

        // Check if access denied
        // Since the WebService API respond to every request with 200 OK, we have to evaluate the response body
        if (strpos($content, "Access denied") === 0)
            throw new ResponseException($content);

        $json = json_decode($content);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JSONException();
        }

        if (isset($json->success) && !$json->success) {
            throw new ResponseException($json->message);
        }
    }
}