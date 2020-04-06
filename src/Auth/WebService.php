<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Auth;

class WebService extends Auth
{
    public string $accessToken;
    public string $npsn;

    public function __construct()
    {
        parent::__construct();

        $this->accessToken = "";
        $this->npsn = "";
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function getNpsn(): string
    {
        return $this->npsn;
    }

    public function setNpsn(string $npsn): self
    {
        $this->npsn = $npsn;

        return $this;
    }
}