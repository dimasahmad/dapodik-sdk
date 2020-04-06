<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Auth\WebService;
use DimasAhmad\Dapodik\SDK\Model\WebServiceModel;
use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getSekolahId()
 * @method string|null getNama()
 * @method string|null getNss()
 * @method string|null getNpsn()
 * @method string|null getAlamatJalan()
 * @method string|null getKodeWilayah()
 * @method string|null getKodePos()
 * @method string|null getNomorTelepon()
 * @method string|null getNomorFax()
 * @method string|null getEmail()
 * @method string|null getWebsite()
 * @method string|null getDesaKelurahan()
 * @method string|null getKecamatan()
 * @method string|null getKabupatenKota()
 * @method string|null getProvinsi()
 */
class Sekolah extends WebServiceModel
{
    use GetPropertyTrait;

    private \stdClass $property;

    public function __construct(WebService $auth)
    {
        parent::__construct($auth);

        $this->property = $this->getSekolahDetails();
    }

    public function getSekolahDetails(): ?\stdClass
    {
        $response = $this->request("GET", "getSekolah");
        $this->body = json_decode($response->getBody()->__toString());
        return $this->body->rows;
    }

    public function getId(): ?string
    {
        return $this->property->sekolah_id;
    }

    public function getBentukPendidikanId(): ?int
    {
        return (int)$this->property->bentuk_pendidikan_id;
    }

    public function getBentukPendidikan(): ?string
    {
        return $this->property->bentuk_pendidikan_id_str;
    }

    public function getStatusSekolahId(): ?int
    {
        return (int)$this->property->status_sekolah;
    }

    public function getStatusSekolah(): ?string
    {
        return $this->property->status_sekolah_str;
    }

    public function isSks(): ?bool
    {
        return (bool)$this->property->is_sks;
    }
}