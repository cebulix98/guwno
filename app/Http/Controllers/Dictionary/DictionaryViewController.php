<?php

namespace App\Http\Controllers\Dictionary;

use App\Http\Controllers\Controller;
use App\Http\Custom\Parameters;
use App\Http\Traits\PaginationTrait;
use App\Models\Dictionary\Dictionary;
use Illuminate\Http\Request;

class DictionaryViewController extends Controller
{
    use PaginationTrait;

    /**
     * view name
     */
    public const VIEW = "subpages.dictionaries.dictionaries";
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
        $this->middleware('permissions:mdictionaries,can_read');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $models = Dictionary::all();

        $current = Dictionary::find($request->id);

        $current_id = ($current != null) ? $current->id : 0;

        return $this->GetView($models->sortByDesc('is_editable'), $current_id);
    }

    /**
     * get view
     *
     * @param array $models
     * @return void
     */
    public function GetView($models, $current_id)
    {

        // $models = $this->GetPagination($models, request());

        return view($this::VIEW, [
            'models' => $models,
            'current' => $current_id,
        ]);
    }
}
