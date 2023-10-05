<?php

namespace App\Http\Controllers\Cases\View;

use App\Http\Controllers\Controller;
use App\Http\Enumerators\SystemEnum;
use App\Models\Cases\CaseCase;
use App\Models\Dictionary\DictionaryCaseStatus;
use App\Models\Motion\Motion;
use App\Models\System\SystemResponseFooter;
use App\Models\User;
use Illuminate\Http\Request;

class CaseAdminSingleViewController extends Controller
{
    public const ROUTE_MAIN = "admin.cases";
    public const ROUTE_EXPANDED = "admin.cases.expanded";
    public const ROUTE_EXPANDED_LAWYERS = "admin.cases.expanded.lawyers.id";
    public const ROUTE_EXPANDED_NOTES = "admin.cases.expanded.notes.id";
    public const ROUTE_EXPANDED_HISTORY = "admin.cases.expanded.history.id";
    public const ROUTE_EXPANDED_ATTACHEMENTS = "admin.cases.expanded.attachements.id";
    public const ROUTE_EXPANDED_RESPONSES = "admin.cases.expanded.responses.id";
    public const ROUTE_EXPANDED_TAB_MOTIONS = "admin.cases.expanded.tab_motions.id";
    public const ROUTE_EXPANDED_FIELDS = "admin.cases.expanded.fields.id";

    /**
     * view name
     */
    public const VIEW = "subpages.cases.cases_admin_single";

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
        $current = CaseCase::where('id',$request->id)->withTrashed()->first();

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($request, $current, $current_id);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView(Request $request, $current, $current_id)
    {
        return view($this::VIEW, [
            'current' => $current,
            'current_id' => $current_id,
            'note_id' => $request->note_id,
            'lawyer_id' => $request->lawyer_id,
            'attachement_id' => $request->attachement_id,
            'history_id' => $request->history_id,
            'lawyers' => User::whereIn('role_id', [2, 4])->get(),
            'route_main' => $this::ROUTE_MAIN,
            'route_expanded' => $this::ROUTE_EXPANDED,
            'route_expanded_lawyers' => $this::ROUTE_EXPANDED_LAWYERS,
            'route_expanded_notes' => $this::ROUTE_EXPANDED_NOTES,
            'route_expanded_attachements' => $this::ROUTE_EXPANDED_ATTACHEMENTS,
            'route_expanded_history' => $this::ROUTE_EXPANDED_HISTORY,
            'route_expanded_responses' => $this::ROUTE_EXPANDED_RESPONSES,
            'route_expanded_motions' => $this::ROUTE_EXPANDED_TAB_MOTIONS,
            'route_expanded_fields' => $this::ROUTE_EXPANDED_FIELDS,
            'dict_statuses' => DictionaryCaseStatus::all(),
            'dict_motions' => Motion::all(),
            'response_id' => $request->response_id,
            'tab_motion_id' => $request->tab_motion_id,
            'system_response_footer' => SystemResponseFooter::where('code', SystemEnum::SYSTEM_RESPONSE_FOOTER)->first(),
            'field_id' => $request->field_id
        ]);
    }
}
