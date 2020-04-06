<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getTahunAjaranId()
 * @method string|null getPtkTerdaftarId()
 * @method string|null getPtkId()
 * @method string|null getPtkInduk()
 * @method string|null getTanggalSuratTugas()
 * @method string|null getNama()
 * @method string|null getJenisKelamin()
 * @method string|null getTempatLahir()
 * @method string|null getTanggalLahir()
 * @method string|null getNuptk()
 * @method string|null getNik()
 * @method string|null getNip()
 * @method string|null getEmail()
 */
class Gtk
{
    use GetPropertyTrait;

    private \stdClass $property;

    public function __construct(\stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->ptk_terdaftar_id;
    }

    public function getAgamaId(): ?int
    {
        return (int)$this->property->agama_id;
    }

    public function getAgama(): ?string
    {
        return $this->property->agama_id_str;
    }

    public function getJenisPtkId(): ?int
    {
        return (int)$this->property->jenis_ptk_id;
    }

    public function getJenisPtk(): ?string
    {
        return $this->property->jenis_ptk_id_str;
    }

    public function getStatusKepegawaianId(): ?int
    {
        return (int)$this->property->status_kepegawaian_id;
    }

    public function getStatusKepegawaian(): ?string
    {
        return $this->property->status_kepegawaian_id_str;
    }
}