<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;

class Auth
{
    protected string $baseUri;
    protected ?string $proxyPort;

    protected array $headers;
    protected CookieJar $cookieJar;

    public Client $client;

    public function __construct()
    {
        $this->baseUri = "http://localhost:5774/";
        $this->headers = ["User-Agent" => "DapodikSDK/master-dev"];
        $this->cookieJar = new CookieJar();
        $this->proxyPort = null;

        $this->client = $this->setClient();
    }

    public function setClient(): Client
    {
        $clientConfig["base_uri"] = $this->baseUri;
        $clientConfig["headers"] = $this->headers;
        $clientConfig["cookies"] = $this->cookieJar;
        if (isset($this->proxyPort)) {
            $clientConfig["verify"] = false;
            $clientConfig["proxy"] = $this->proxyPort;
        }

        $client = new Client($clientConfig);

        return $client;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri): self
    {
        $this->baseUri = $baseUri;
        $this->client = $this->setClient();

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        foreach ($headers as $name => $value) {
            $this->headers[$name] = $value;
        }
        $this->client = $this->setClient();

        return $this;
    }

    public function getCookies(): array
    {
        return $this->cookieJar->toArray();
    }

    public function setCookies(array $cookies, string $domain): self
    {
        foreach ($cookies as $name => $value) {
            $this->cookieJar->setCookie(new SetCookie([
                'Domain' => $domain,
                'Name' => $name,
                'Value' => $value,
                'Discard' => true
            ]));
        }

        return $this;
    }

    public function getProxyPort(): string
    {
        return $this->proxyPort;
    }

    public function setProxyPort(string $proxyPort): self
    {
        $this->proxyPort = $proxyPort;
        $this->client = $this->setClient();

        return $this;
    }
}