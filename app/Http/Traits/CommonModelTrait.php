<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;

//handle pagination
trait CommonModelTrait
{
    /**
     * get status name
     *
     * @return void
     */
    public function GetStatusName()
    {
        $status = $this->GetStatusFromConfig($this->status_code);
        if ($status == false && $this->status) $status = $this->status->name;
        return $status;
    }
}
