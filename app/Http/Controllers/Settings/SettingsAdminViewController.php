<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsAdminViewController extends Controller
{
     /**
     * view name
     */
    public const VIEW = "subpages.settings.admin.settings_admin";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('permissions:madmin,can_read');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return $this->GetView();
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView()
    {
        return view($this::VIEW, []);
    }
}
