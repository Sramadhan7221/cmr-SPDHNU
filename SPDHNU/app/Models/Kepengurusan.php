<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $guarded = 'id_pengurus';
    protected $fillable = [
        'nama_pengurus',
        'alamat_pengurus',
        'no_ktp',
        'no_telp',
        'file_ktp',
        'alamat_ktp',
        'role'
    ];
}