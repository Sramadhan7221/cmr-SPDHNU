<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rab extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rab';
    protected $primaryKey = 'id_rab';
    protected $keyType = 'string';
    protected $guarded = 'id_rab';
    protected $fillable = [
        'rab_kegiatan',
        'uraian',
        'satuan',
        'qty',
        'harga',
        'total'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
