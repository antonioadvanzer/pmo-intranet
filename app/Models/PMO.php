<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMO extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization', 'model', 'planning_methodology', 'tracing', 'implementation', 'go_live', 'close_project'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pmo';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get project associated.
     */
    public function getProject()
    {
        return $this->hasOne('App\Models\Project','pmo');
    }
}
