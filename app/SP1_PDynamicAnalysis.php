<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SP1_PDynamicAnalysis extends Model
{
    protected $table="sp1_pdynamicanalysis";
    protected $primaryKey="SP1_PDynamicAnalysis_ID";

    public function StudyPeriod1()
    {
        return $this->belongsTo('App\StudyPeriod1','SP1_PDynamicAnalysis','SP1_PDynamicAnalysis_ID');
    }

}
