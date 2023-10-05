<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserGlobalManageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
