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
    protected $keyType = 'string';
    public static function getKecamatan () {
        return self::query()
            ->whereRaw("LEFT(kode,5) = '32.06' and LENGTH(kode) = 8")
            ->get(['kode','nama']);
    }

    public function getDesa (string $kecamatan) {
        return $this->query()
            ->where('LEFT(kode,8)', $kecamatan)
            ->where('LENGTH(kode)', 13)
            ->all();
    }
}
