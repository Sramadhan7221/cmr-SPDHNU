<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persyaratan';
    protected $primaryKey = 'id_persyaratan';
    protected $guarded = 'id_persyaratan';
    protected $fillable = [
        'nama_persyaratan',
        'nomor_surat',
        'yang_mengeluarkan',
        'file'
    ];
}
