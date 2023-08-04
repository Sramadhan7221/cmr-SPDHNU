<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kepengurusan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kepengurusan';
    protected $primaryKey = 'id_pengurus';
    protected $keyType = 'string';
    protected $guarded = 'id_pengurus';
    protected $fillable = [
        'nama_pengurus',
        'jabatan',
        'alamat_pengurus',
        'no_ktp',
        'no_telp',
        'file_ktp',
        'alamat_ktp',
        'role'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
