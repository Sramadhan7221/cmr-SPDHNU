<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RabKegiatan extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rab_kegiatan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'proposal',
        'nama_kegiatan',
        'sub_total'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
