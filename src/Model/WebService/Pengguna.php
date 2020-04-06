<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getPenggunaId()
 * @method string|null getSekolahId()
 * @method string|null getUsername()
 * @method string|null getNama()
 * @method string|null getPassword()
 * @method string|null getAlamat()
 * @method string|null getNoTelepon()
 * @method string|null getNoHp()
 */
class Pengguna
{
    use GetPropertyTrait;

    private \stdClass $property;

    public function __construct(\stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->pengguna_id;
    }

    public function getPeran(): ?string
    {
        return $this->property->peran_id_str;
    }
}