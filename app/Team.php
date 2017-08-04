<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Get the evaluations of the team.
     */
    public function evaluations()
    {
        return $this->hasMany('App\Report');
    }
}
