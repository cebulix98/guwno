<?php

namespace App\Http\Controllers\Stats;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Traits\PaginationTrait;
use App\Models\User;
use Illuminate\Http\Request;

class StatsLawyerViewController extends Controller
{
    use PaginationTrait;

    /**
     * view name
     */
    public const VIEW = "subpages.stats.stats_lawyer";

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $current = User::where('id', $request->id)->withTrashed()->first();
        $current_id = ($current != null) ? $current->id : 0;
        $models = User::whereIn('role_id', [2, 4])->get();

        return $this->GetView($request, $models->sortBy('name'), $current, $current_id);
    }

    /**
     * get view
     *
     * @param Request $request
     * @param array $models
     * @param User $current
     * @param int $current_id
     * @return void
     */
    public function GetView(Request $request, $models, $current, $current_id)
    {
        $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current' => $current,
            'current_id' => $current_id
        ]);
    }
}
