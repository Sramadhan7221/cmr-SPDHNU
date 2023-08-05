<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

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
    public $incrementing = false;
    protected $fillable = [
        'lembaga',
        'pengurus',
        // 'persyaratan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function lembaga() : HasOne
    {
        return $this->hasOne(Lembaga::class);
    }

    public function pengurus() : HasMany
    {
        return $this->hasMany(Kepengurusan::class);
    }

}
