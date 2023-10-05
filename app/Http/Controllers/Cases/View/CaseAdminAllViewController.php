<?php

namespace App\Http\Controllers\Cases\View;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Traits\PaginationTrait;
use App\Models\Cases\CaseCase;
use App\Models\Dictionary\DictionaryCaseStatus;
use App\Models\Motion\Motion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CaseAdminAllViewController extends Controller
{
    use PaginationTrait;

    /**
     * view name
     */
    public const VIEW = "subpages.cases.cases_admin_all";
    /**
     * items per page
     *
     * @var int
     */
    public $itemsPerPage = Parameters::ITEMS_PER_PAGE_BASIC;

    public const ROUTE_MAIN = "admin.cases";
    public const ROUTE_EXPANDED = "admin.cases.expanded";

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
        $models = ($request->is_archived) ? CaseCase::onlyTrashed()->get() : CaseCase::all();
        $models = ($request->keyword) ? $this->Search($request->keyword) : $models;
        $models = ($request->status_id) ? $this->FilterByStatus($models, $request->status_id) : $models;
        $models = ($request->name) ? $this->FilterByName($models, $request->name) : $models;
        $models = ($request->motion_id) ? $this->FilterByMotion($models, $request->motion_id) : $models;
        $models = ($request->petitioner) ? $this->FilterByPetitioner($models, $request->petitioner) : $models;
        $models = ($request->lawyer) ? $this->FilterByLawyer($models, $request->lawyer) : $models;

        $current = CaseCase::where('id',$request->id)->withTrashed()->first();

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models->sortByDesc('created_at'), $current, $current_id, $request->is_archived, $request->status_id, $request->name, $request->motion_id, $request->petitioner, $request->lawyer, $request);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView($models, $current, $current_id, $filter_is_archived, $filter_status_id, $filter_name, $filter_motion_id, $filter_petitioner, $filter_lawyer, $request)
    {
        $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current' => $current,
            'current_id' => $current_id,
            'lawyers' => User::whereIn('role_id', [2, 4])->get(),
            'route_main' => $this::ROUTE_MAIN,
            'route_expanded' => $this::ROUTE_EXPANDED,
            'filter_is_archived' => $filter_is_archived,
            'filter_status_id' => $filter_status_id,
            'filter_name' => $filter_name,
            'filter_motion_id' => $filter_motion_id,
            'filter_petitioner' => $filter_petitioner,
            'filter_lawyer' => $filter_lawyer,
            'dict_statuses' => DictionaryCaseStatus::all(),
            'dict_motions' => Motion::all(),
        ]);
    }

    /**
     * search for keyword
     *
     * @param string $keyword
     * @return array
     */
    public function Search($keyword)
    {
        $models = CaseCase::search($keyword)->get();
        return $models;
    }

    public function FilterByStatus($models, $status_id)
    {
        return $models->where('status_id', $status_id);
    }

    public function FilterByName($models, $name)
    {
        $name = str_replace('.','/',$name);
        return $models->filter(function ($model) use ($name) {
            return stristr($model->name, $name);
        });
    }

    public function FilterByMotion($models, $motion_id)
    {
        return $models->where('motion_id', $motion_id);
    }

    public function FilterByPetitioner($models, $petitioner)
    {
        return $models->filter(function ($model) use ($petitioner) {
            return stristr($model->firstname, $petitioner) || stristr($model->lastname, $petitioner);
        });

        return $models;
    }

    public function FilterByLawyer($models, $lawyer)
    {
        // $users = User::search($lawyer)->get();
        // $ids = $users->pluck('id');

        $user = User::find($lawyer);

        $query = CaseCase::with('lawyers');
        $models = $query->whereHas('lawyers', function ($query) use ($user) {
            $query = $query->where('user_id', $user->id);
        })->get();

        // $users = User::search($lawyer)->get();
        // $ids = $users->pluck('id');

        // $query = CaseCase::with('lawyers');
        // $models = $query->whereHas('lawyers', function ($query) use ($ids) {
        //     $query = $query->whereIn('user_id', $ids);
        // })->get();

        // return $models;

        return $models;
    }
}
