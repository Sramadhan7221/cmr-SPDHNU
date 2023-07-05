<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegisterUser extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'register_user';
    protected $guarded = 'id';
    protected $fillable = [
        'nik',
        'kecamatan',
        'nama',
        'nama_mwc',
        'email',
        'no_telp',
        'password'
    ];
}
