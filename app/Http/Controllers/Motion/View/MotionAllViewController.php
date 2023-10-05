<?php

namespace App\Http\Controllers\Motion\View;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Traits\PaginationTrait;
use App\Models\Motion\Motion;
use Illuminate\Http\Request;

class MotionAllViewController extends Controller
{
    use PaginationTrait;

    /**
     * view name
     */
    public const VIEW = "subpages.motions.motions_admin_all";
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
        $this->middleware('permissions:madmin,can_read');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $models = Motion::all();

        $current = Motion::find($request->id);

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models, $current, $current_id);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView($models, $current, $current_id)
    {
        $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current' => $current,
            'current_id' => $current_id,
        ]);
    }
}
