<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use DimasAhmad\Dapodik\SDK\Model\WebServiceModel;

class GtkList extends WebServiceModel
{
    /**
     * @var \stdClass[] array of PenggunaList objects
     */
    private array $property;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\Gtk[] array of Gtk objects
     */
    public array $list;

    public function __construct(WebService $auth)
    {
        parent::__construct($auth);

        $this->property = $this->getGTKListDetails();
        $this->list = $this->listGTK();
    }

    public function getGTKListDetails(): array
    {
        $response = $this->request("GET", "getGtk");
        $this->body = json_decode($response->getBody()->__toString());

        return $this->body->rows;
    }

    public function listGTK(): array
    {
        $gtkList = array_map(function ($gtk) {
            return new Gtk($gtk);
        }, $this->property);

        return $gtkList;
    }
}