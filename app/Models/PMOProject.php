<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMOProject extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project', 'pmo_category'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pmo_project';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get project associated.
     */
    public function getProjectAssociated()
    {
        return $this->belongsTo('App\Models\Project','project');
    }

    /**
     * Get pmo category associated.
     */
    public function getPmoCategoryAssociated()
    {
        return $this->belongsTo('App\Models\PMOCategory','pmo_category');
    }

    /**
     * get users
     */
    public function getUser()
    {
        return $this->hasMany('App\Models\Users','pmo');
    }

    /**
     * get PMO projects attributes
     */
    public function getPmoProjectAttributes()
    {
        return $this->hasMany('App\Models\PMOProjectAttribute','pmo_project');
    }
}
