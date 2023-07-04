<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'register_user';
    protected $primaryKey = 'nik';
    protected $guarded = 'nik';
    protected $fillable = [
        'kecamatan',
        'nama',
        'nama_mwc',
        'email',
        'no_telp',
        'password'
    ];
}
