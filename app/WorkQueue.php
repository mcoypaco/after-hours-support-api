<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkQueue extends Model
{
    /*
     * Get the evaluation record of worker queue
     *
    */
    public function evaluation()
    {
        return $this->belongsTo('App\Evaluation');
    }
}
