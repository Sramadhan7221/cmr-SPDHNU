<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'total_rab'
    ];
}
