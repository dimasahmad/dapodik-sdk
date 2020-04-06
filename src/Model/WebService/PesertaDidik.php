<?php declare(strict_types=1);

namespace DimasAhmad\Dapodik\SDK\Model\WebService;

use DimasAhmad\Dapodik\SDK\Traits\MagicMethods\GetPropertyTrait;
use stdClass;

/**
 * @method string|null getRegistrasiId()
 * @method string|null getNipd()
 * @method string|null getTanggalMasukSekolah()
 * @method string|null getSekolahAsal()
 * @method string|null getPesertaDidikId()
 * @method string|null getNama()
 * @method string|null getNisn()
 * @method string|null getJenisKelamin()
 * @method string|null getNik()
 * @method string|null getTempatLahir()
 * @method string|null getTanggalLahir()
 * @method string|null getAlamatJalan()
 * @method string|null getNomorTeleponRumah()
 * @method string|null getNomorTeleponSeluler()
 * @method string|null getNamaAyah()
 * @method string|null getNamaIbu()
 * @method string|null getNamaWali()
 * @method string|null getSemesterId()
 * @method string|null getAnggotaRombelId()
 * @method string|null getRombonganBelajarId()
 * @method string|null getNamaRombel()
 */
class PesertaDidik
{
    use GetPropertyTrait;

    private stdClass $property;

    public function __construct(stdClass $property)
    {
        $this->property = $property;
    }

    public function getId(): ?string
    {
        return $this->property->registrasi_id;
    }

    public function getJenisPendaftaranId(): ?int
    {
        return (int)$this->property->jenis_pendaftaran_id;
    }

    public function getJenisPendaftaran(): ?string
    {
        return $this->property->jenis_pendaftaran_id_str;
    }

    public function getAgamaId(): ?int
    {
        return (int)$this->property->agama_id;
    }

    public function getAgama(): ?string
    {
        return $this->property->agama_id_str;
    }

    public function getPekerjaanAyahId(): ?int
    {
        return (int)$this->property->pekerjaan_ayah_id;
    }

    public function getPekerjaanAyah(): ?string
    {
        return $this->property->pekerjaan_ayah_id_str;
    }

    public function getPekerjaanIbuId(): ?int
    {
        return (int)$this->property->pekerjaan_ibu_id;
    }

    public function getPekerjaanIbu(): ?string
    {
        return $this->property->pekerjaan_ibu_id_str;
    }

    public function getPekerjaanWaliId(): ?int
    {
        return (int)$this->property->pekerjaan_wali_id;
    }

    public function getPekerjaanWali(): ?string
    {
        return $this->property->pekerjaan_wali_id_str;
    }

    public function getTingkatPendidikanId(): ?int
    {
        return (int)$this->property->tingkat_pendidikan_id;
    }

    public function getKurikulumId(): ?int
    {
        return (int)$this->property->kurikulum_id;
    }

    public function getKurikulum(): ?string
    {
        return $this->property->kurikulum_id_str;
    }
}