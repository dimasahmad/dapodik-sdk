<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use DimasAhmad\Dapodik\SDK\Model\WebServiceModel;

class PesertaDidikList extends WebServiceModel
{
    /**
     * @var \stdClass[]
     */
    private array $property;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\PesertaDidik[]|null
     */
    public ?array $list;

    public function __construct(WebService $auth)
    {
        parent::__construct($auth);

        $this->property = $this->getPesertaDidikDetails();
        $this->list = $this->listPesertaDidik();
    }

    public function getPesertaDidikDetails(): array
    {
        $response = $this->request("GET", "getPesertaDidik");
        $this->body = json_decode($response->getBody()->__toString());
        return $this->body->rows;
    }

    public function listPesertaDidik(): ?array
    {
        $pesertaDidikList = array_map(function ($pesertaDidik) {
            return new PesertaDidik($pesertaDidik);
        }, $this->property);

        return $pesertaDidikList;
    }
}