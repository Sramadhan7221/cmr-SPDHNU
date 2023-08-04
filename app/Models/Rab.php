<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rab extends Model
{
    use HasFactory, SoftDeletes;
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
