<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsViewController extends Controller
{
      /**
     * view name
     */
    public const VIEW = "subpages.settings.settings";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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
