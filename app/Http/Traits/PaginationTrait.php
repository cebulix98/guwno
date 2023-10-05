<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

//handle pagination
trait PaginationTrait {

    /**
     * Get collection pagination
     * @param array $items items collection to paginate
     * @param \Illuminate\Http\Request  $request
     * @return array paginated collection
     */
    public function GetPagination($items, $request) {
        $items = collect($items);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $items->slice(($currentPage * $this->itemsPerPage) - $this->itemsPerPage, $this->itemsPerPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($items), $this->itemsPerPage);
        $items = $paginatedItems->setPath($request->url());
        return $items;
    }
}