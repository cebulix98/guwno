<?php

namespace App\Http\Custom\Pdf;

use App\Models\Cases\CaseCase;
use App\Models\Motion\Motion;
use Carbon\Carbon;

/** create pdf file */
class PdfMotionParameters
{
  

    public $motion_id;

    public $case_id;

    public $attributes;

    public $motion;
    public $case;

    public function __construct($motion_id, $case_id, $attributes)
    {
       
        $this->motion_id = $motion_id;
        $this->case_id = $case_id;
        $this->attributes = $attributes;
        $this->motion = Motion::find($motion_id);
        $this->case = CaseCase::find($case_id);

        $this->BuildAttributes();
    }

    public function BuildAttributes() {
        $attributes = array();
        if($this->case) {
            $fields = $this->case->case_motion_fields;
            foreach($fields as $field) {
                if($field->field) {
                    $attributes[$field->field->code] = $field->data; 
                }
            }
        }

        $this->attributes = $attributes;
    }
}