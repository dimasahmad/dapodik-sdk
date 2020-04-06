<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;

/**
 * @method string|null getRombonganBelajarId()
 * @method string|null getNama()
 * @method string|null getSemesterId()
 * @method string|null getMovingClass()
 */
class RombonganBelajar
{
    use GetPropertyTrait;

    private \stdClass $property;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\AnggotaRombel[]|null array of AnggotaRombel objects
     */
    private ?array $anggotaRombel;

    /**
     * @var \DimasAhmad\Dapodik\SDK\Model\WebService\Pembelajaran[]|null array of Pembelajaran objects
     */
    private ?array $pembelajaran;

    public function __construct(\stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->rombongan_belajar_id;
    }

    public function getTingkatPendidikanId(): ?int
    {
        return (int)$this->property->tingkat_pendidikan_id;
    }

    public function getJenisRombelId(): ?int
    {
        return (int)$this->property->jenis_rombel_id;
    }

    public function getJenisRombel(): ?string
    {
        return $this->property->jenis_rombel_str;
    }

    public function getKurikulumId(): ?int
    {
        return (int)$this->property->kurikulum_id;
    }

    public function getKurikulum(): ?string
    {
        return $this->property->kurikulum_id_str;
    }

    public function getRuangId(): ?string
    {
        return $this->property->id_ruang;
    }

    public function getRuang(): ?string
    {
        return $this->property->id_ruang_str;
    }

    public function getPtkId(): ?string
    {
        return $this->property->ptk_id;
    }

    public function getPtk(): ?string
    {
        return $this->property->ptk_id_str;
    }

    public function getJurusanId(): ?int
    {
        return (int)$this->property->jurusan_id;
    }

    public function getJurusan(): ?string
    {
        return $this->property->jurusan_id_str;
    }

    public function listAnggotaRombel(): ?array
    {
        $anggotaRombelList = array_map(function ($anggotaRombel) {
            return new AnggotaRombel($anggotaRombel);
        }, $this->property->anggota_rombel);

        $this->anggotaRombel = $anggotaRombelList;

        return $this->anggotaRombel;
    }

    public function listPembelajaran(): ?array
    {
        $pembelajaranList = array_map(function ($pembelajaran) {
            return new Pembelajaran($pembelajaran);
        }, $this->property->pembelajaran);

        $this->pembelajaran = $pembelajaranList;

        return $this->pembelajaran;
    }
}