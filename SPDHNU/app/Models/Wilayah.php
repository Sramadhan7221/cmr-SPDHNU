<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wilayah';
    protected $primaryKey = 'kode';
    public function getKecamatan () {
        return $this->query()
            ->where('LEFT(kode,5)', '32.06')
            ->where('LENGTH(kode)',8)
            ->all();
    }

    public function getDesa (string $kecamatan) {
        return $this->query()
            ->where('LEFT(kode,8)', $kecamatan)
            ->where('LENGTH(kode)', 13)
            ->all();
    }
}
