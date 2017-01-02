<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessUnitAttributeValue extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'business_unit', 'business_unit_attribute', 'link'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_unit_attribute_value';

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
     * Get business unit associated attribute associated.
     */
    public function getBusinessUnitAttributeAssociated()
    {
        return $this->belongsTo('App\Models\BusinessUnitAttribute','business_unit_attribute');
    }

    /**
     * Get link of GD associated.
     */
    public function getGDLink()
    {
        return $this->belongsTo('App\Models\GDLink','link');
    }
}
