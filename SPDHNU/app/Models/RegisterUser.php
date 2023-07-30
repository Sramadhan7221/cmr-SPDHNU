<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'role_id',
        'nik',
        'kecamatan',
        'nama',
        'nama_mwc',
        'email',
        'no_telp',
        'password'
    ];

    protected static function boot(){
        parent::boot();

        static::creating( function($register_user){
            $register_user->password = Hash::make($register_user->password);
        });

        static::updating( function(RegisterUser $register_user){
            if($register_user->isDirty(["password"])){
                $register_user->password = Hash::make($register_user->password);
            }
        });
    }
    public function role() : HasOne
    {
        return $this->hasOne(Role::class);
    }
}
