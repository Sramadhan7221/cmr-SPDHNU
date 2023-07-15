<?php

namespace App\Http\Controllers;

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

}
