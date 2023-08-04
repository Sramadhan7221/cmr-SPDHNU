<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proposal extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposal';
    protected $primaryKey = 'id_proposal';
    protected $keyType = 'string';
    protected $guarded = 'id_proposal';
    protected $fillable = [
        'lembaga',
        'no_NPHD',
        'peruntukan',
        'file_proposal',
        'nilai_pengajuan',
        'total_rab',
        'tahun',
        'sumber_dana'
    ];

    protected $casts = [
        'no_NPHD' => 'string',
        'nilai_pengajuan' => 'decimal:2',
        'total_rab' => 'decimal:2'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }
}
