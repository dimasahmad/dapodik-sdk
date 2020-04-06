<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getPembelajaranId()
 * @method string|null getPtkTerdaftarId()
 * @method string|null getPtkId()
 * @method string|null getNamaMataPelajaran()
 * @method string|null getIndukPembelajaranId()
 */
class Pembelajaran
{
    use GetPropertyTrait;

    private \stdClass $property;

    public function __construct(\stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->pembelajaran_id;
    }

    public function getMataPelajaranId(): ?int
    {
        return (int)$this->property->mata_pelajaran_id;
    }

    public function getMataPelajaran(): ?string
    {
        return $this->property->mata_pelajaran_id_str;
    }

    public function getStatusDiKurikulumId(): ?int
    {
        return (int)$this->property->status_di_kurikulum;
    }

    public function getStatusDiKurikulum(): ?string
    {
        return $this->property->status_di_kurikulum_str;
    }
}