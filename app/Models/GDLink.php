<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GDLink extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link_format'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gd_link';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * get Attributes of PMO Projects
     */
    public function getPmoProjectAttribute()
    {
        return $this->hasMany('App\Models\PMOProjectAttribute','link');
    }

    /**
     * Get values of projects attributes.
     */
    public function getProjectAttributeValue()
    {
        return $this->hasMany('App\Models\PMOProjectAttributeValue','link');
    }

    /**
     * Get values of business units attributes.
     */
    public function getBusinessUnitAttributeValue()
    {
        return $this->hasMany('App\Models\BusinessUnitAttributeValue','link');
    }
}
