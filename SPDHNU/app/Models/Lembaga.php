<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lembaga extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lembaga';
    protected $primaryKey = 'id_lembaga';
    protected $keyType = 'string';
    protected $guarded = 'id_lembaga';
    protected $fillable = [
        'nama_lembaga',
        'alamat_lembaga',
        'no_telp',
        'email_lembaga',
        'kabupaten',
        'kecamatan',
        'desa',
        'kop_surat',
        'domisili',
        'bank',
        'no_rek',
        'nama_rekening',
        'cabang_bank',
        'file_buku_tabungan'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
