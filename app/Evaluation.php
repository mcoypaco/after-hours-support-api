<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'array',
    ];

    /**
     * Get the agent of the evaluation.
     */
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
    
    /**
     * Get the campaign of the evaluation.
     */
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    
    /**
     * Get the team of the evaluation.
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    
    /**
     * Get the work queue of the evaluation.
     */
    public function work_queue()
    {
        return $this->belongsTo('App\WorkQueue');
    }
}
