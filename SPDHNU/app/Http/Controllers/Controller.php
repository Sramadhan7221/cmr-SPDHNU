<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $display_menus = [
        'home' => true,
        'operator' => false,
        'persyaratan' => false,
        'pimpinan' => false
    ];

    protected $display_menu = [
        'bank' => true,
        'proposal' => false,
        'rab' => false,
        'history' => false
    ];

    protected function headHibah ($id_proposal) {
        return Proposal::select(['id_proposal', 'no_NPHD', 'sumber_dana', 'nama_lembaga', 'alamat_lembaga', 'peruntukan', 'nilai_pengajuan', 'tahun'])
        ->join('lembaga', 'proposal.lembaga', '=', 'lembaga.id_lembaga')
        ->where('id_proposal', $id_proposal)
        ->first();
    }

}
