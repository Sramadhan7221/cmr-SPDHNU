<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PengurusLembaga extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengurus_lembaga';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = 'id';
    protected $fillable = [
        'lembaga',
        'pengurus',
        'persyaratan',
    ];

    public function lembaga() : HasOne 
    {
        return $this->hasOne(Lembaga::class);
    }

    public function pengurus() : HasMany 
    {
        return $this->hasMany(Kepengurusan::class);
    }

    public function persyaratan() : HasMany 
    {
        return $this->hasMany(Persyaratan::class);
    }
}
