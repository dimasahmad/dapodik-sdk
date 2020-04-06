<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getAnggotaRombelId()
 * @method string|null getPesertaDidikId()
 */
class AnggotaRombel
{
    use GetPropertyTrait;

    private \stdClass $property;

    public function __construct(\stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->anggota_rombel_id;
    }

    public function getJenisPendaftaranId(): ?int
    {
        return (int)$this->property->jenis_pendaftaran_id;
    }

    public function getJenisPendaftaran(): ?string
    {
        return $this->property->jenis_pendaftaran_id_str;
    }
}