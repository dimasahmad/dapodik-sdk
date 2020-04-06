<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use DimasAhmad\Dapodik\SDK\Model\WebServiceModel;

class PenggunaList extends WebServiceModel
{
    /**
     * @var \stdClass[]
     */
    private array $property;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\Pengguna[]|null
     */
    public ?array $list;

    public function __construct(WebService $auth)
    {
        parent::__construct($auth);

        $this->property = $this->getPenggunaDetails();
        $this->list = $this->listPengguna();
    }

    public function getPenggunaDetails(): array
    {
        $response = $this->request("GET", "getPengguna");
        $this->body = json_decode($response->getBody()->__toString());
        return $this->body->rows;
    }

    public function listPengguna(): array
    {
        $penggunaList = array_map(function ($pengguna) {
            return new Pengguna($pengguna);
        }, $this->property);

        return $penggunaList;
    }
}