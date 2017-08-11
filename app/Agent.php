<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    protected $maxNumberPerRequest = 10;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_number', 'name'];

    /**
     * Set the user's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(
            strtolower($value)
        );
    }

    /**
     * Get the evaluations of the agent.
     */
    public function evaluations()
    {
        return $this->hasMany('App\Report');
    }

    /**
     * Check if the requested agent has duplicate.
     */
    public static function checkDuplicate()
    {
        $model = 'App\Agent';
        $column = 'employee_number';

        if(request()->has('id')) {
            $duplicate = $model::where($column, request()->$column)->whereNotIn('id', [request()->id])->first();
        }
        else {
            $duplicate = $model::where($column, request()->$column)->first();
        }

        if($duplicate) abort(422, "{$model} already exists");
    }

    /**
     * Search for the resource according to indexes and keywords.
     */
    public static function search()
    {
        $agent = Agent::query();

        $columns = collect(['employee_number', 'name']);

        $columns->each(function($column) use($agent) {
            if(request()->index == $column) {
                $agent->where($column, request()->keyword);
            }
        });

        return $agent->orderBy('name')->paginate(Agent::maxNumberPerRequest());
    }

    public static function maxNumberPerRequest() {
        $agent = new static;

        return $agent->maxNumberPerRequest;
    }
}
