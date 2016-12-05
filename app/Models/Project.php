<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'client', 'objective', 'scope', 'status', 'progress', 'business_unit'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get business unit associated.
     */
    public function getBusinessUnitAssociated()
    {
        return $this->belongsTo('App\Models\BusinessUnit','business_unit');
    }

    /**
     * Get pmo associated.
     */
    public function getPMO()
    {
        return $this->hasMany('App\Models\PMOProject','project');
    }

    /**
     * Get attributes by Project.
     */
    public function getAttributesValues()
    {
        return $this->hasMany('App\Models\ProjectAttributeValue','project');
    }
}
