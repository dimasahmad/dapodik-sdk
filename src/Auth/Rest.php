<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Auth;

class Rest extends Auth
{
    protected string $username;
    protected string $password;

    public function __construct()
    {
        parent::__construct();

        $this->username = "";
        $this->password = "";
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function login(): self
    {
        $loginPage = $this->client->request('GET', '/')->getBody()->getContents();
        $regex = "/name\=['\"]semester_id['\"].*?option.+?value\=['\"](\d+)['\"].+?selected/";
        $semester = preg_match($regex, $loginPage, $match) ? $match[1] : null;

        $login = $this->client->request('POST', '/login', [
            'form_params' => [
                'username' => $this->username,
                'password' => $this->password,
                'rememberme' => 'on',
                'semester_id' => $semester,
            ],
        ]);

        return $this;
    }
}