<?php

namespace App\Http\Controllers\Settings\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Permission\UserPermissionRole;
use Illuminate\Http\Request;

class SettingsPermissionsViewController extends Controller
{
    /**
     * view name
     */
    public const VIEW = "subpages.settings.admin.settings_permissions";

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
        $models = UserPermissionRole::all();

        $current = UserPermissionRole::find($request->id);

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models, $current, $current_id);
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView($models, $current, $current_id)
    {
        return view($this::VIEW, [
            'models' => $models,
            'current' => $current,
            'current_id' => $current_id
        ]);
    }
}
