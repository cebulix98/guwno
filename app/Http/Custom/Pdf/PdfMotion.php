<?php

namespace App\Http\Custom\Pdf;

use App\Models\Cases\CaseCase;
use App\Models\Motion\Motion;
use Exception;
use PDF;

/** create pdf file */
class PdfMotion
{
    protected $motion_id;

    protected $case_id;

    public $case;

    public function __construct($motion_id, $case_id)
    {
        $this->motion_id = $motion_id;
        $this->motion = Motion::find($motion_id);

        $this->case_id = $case_id;
        $this->case = CaseCase::find($case_id);
    }

    public function PrepareParameters() {
        if(!$this->motion || !$this->case) throw new Exception();

        $attributes = array();

        $parameters = $this->GenerateParameters($attributes);

        return $parameters;
    }

    public function GenerateParameters($attributes) {
        $parameters = new PdfMotionParameters($this->motion_id, $this->case_id, $attributes);

        return $parameters;
    }

}
