<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use DimasAhmad\Dapodik\SDK\Model\WebServiceModel;

class RombonganBelajarList extends WebServiceModel
{
    /**
     * @var \stdClass[]
     */
    private array $property;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\RombonganBelajar[]|null
     */
    public ?array $list;

    public function __construct(WebService $auth)
    {
        parent::__construct($auth);

        $this->property = $this->getRombonganBelajarDetails();
        $this->list = $this->listRombonganBelajar();
    }

    public function getRombonganBelajarDetails(): array
    {
        $response = $this->request("GET", "getPengguna");
        $this->body = json_decode($response->getBody()->__toString());
        return $this->body->rows;
    }

    public function listRombonganBelajar(): array
    {
        $rombonganBelajarList = array_map(function ($rombonganBelajar) {
            return new RombonganBelajar($rombonganBelajar);
        }, $this->property);

        return $rombonganBelajarList;
    }
}