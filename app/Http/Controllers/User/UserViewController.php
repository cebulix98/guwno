<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Enumerators\SystemEnum;
use App\Http\Traits\PaginationTrait;
use App\Models\System\SystemResponseFooter;
use App\Models\User;
use App\Models\User\Permission\UserPermissionRole;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    use PaginationTrait;

    /**
     * view name
     */
    public const VIEW = "subpages.users.users";
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
        $this->middleware('permissions:musers,can_read');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $models = User::all();

        $current = User::find($request->id);

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models, $current_id, $current);
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView($models, $current_id, $current)
    {

        $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current_id' => $current_id,
            'current' => $current,
            'roles' => UserPermissionRole::where('id', '!=', 1)->get(),
            'system_response_footer' => SystemResponseFooter::where('code', SystemEnum::SYSTEM_RESPONSE_FOOTER)->first()
        ]);
    }
}
