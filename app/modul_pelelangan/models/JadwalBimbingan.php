<?php

namespace SistemTA\Penjadwalan\Models;

use Phalcon\Logger\Formatter\Json;
use SistemTA\TA\Models\Dosen;
use SistemTA\TA\Models\Mahasiswa;
use SistemTA\TA\Models\Pengguna;

class JadwalBimbingan extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id_jadwal_bimbingan", type="integer", length=11, nullable=false)
     */
    public $id_jadwal_bimbingan;

    /**
     *
     * @var integer
     * @Column(column="nim_mahasiswa", type="integer", length=12, nullable=false)
     */
    public $nim_mahasiswa;

    /**
     *
     * @var integer
     * @Column(column="nip_dosen_pembimbing", type="integer", length=30, nullable=false)
     */
    public $nip_dosen_pembimbing;

    /**
     *
     * @var string
     * @Column(column="bimbingan_deskripsi", type="string", nullable=false)
     */
    public $bimbingan_deskripsi;
    public $jenis_bimbingan;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_penjadwalan_ta");
        $this->setSource("jadwal_bimbingan");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */

    public function getDataMahasiswa()
    {
        return Mahasiswa::findFirstByNim($this->nim_mahasiswa);

    }
    public function getSource()
    {
        return 'jadwal_bimbingan';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JadwalBimbingan[]|JadwalBimbingan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JadwalBimbingan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getNamaMahasiswaFromPengguna()
    {
        return Pengguna::findFirstByNipNim($this->nim_mahasiswa)->nama;
    }

    public function getFieldOptions($column)
    {
        $sql = "SHOW COLUMNS FROM " . $this->getSource() . " LIKE '" . $column . "' ";
        $conn = mysqli_connect('localhost', 'rndmjck', 'rootreload', 'db_penjadwalan_ta');

        $result = mysqli_query($conn, $sql);

        if (!is_array($result)) {
            $options = $result->fetch_object()->Type;
        }
        $options = explode(',',str_replace(['enum','(',')',"'"],['','','',''],$options));


        return $options;
    }

    public static function cariJadwalBimbingan($jenis_bimbingan,$pilih_pembimbing)
    {

    }


}
