<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Traits\PaginationTrait;
use App\Models\User;
use App\Models\User\Permission\UserPermissionRole;
use Illuminate\Http\Request;

class UserGlobalViewController extends Controller
{
    use PaginationTrait;

    
    /**
     * view name
     */
    public const VIEW = "subpages.users.users_global";
    /**
     * items per page
     *
     * @var int
     */
    public $itemsPerPage = Parameters::ITEMS_PER_PAGE_BASIC;

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
        $models = User::all();
        $models = $this->Search($models, $request->keyword);

        $current = User::find($request->id);

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models, $current_id, $request->keyword);
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView($models, $current_id, $keyword)
    {

        $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current' => $current_id,
            'roles' => UserPermissionRole::all(),
            'keyword' => $keyword
        ]);
    }

    /**
     * search for items with keyword (name or code)
     *
     * @param Request $request
     * @return array
     */
    public function Search($models, $keyword)
    {
        $result = array();

        if ($keyword != null && $keyword != '') {
            $result = User::search($keyword)->get();
        } else {
            return $models;
        }

        return $result->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values();
    }
}
