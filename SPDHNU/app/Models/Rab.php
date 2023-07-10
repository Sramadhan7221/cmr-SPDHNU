<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    use HasFactory;
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
        'proposal',
        'uraian',
        'satuan',
        'harga',
    ];
}
