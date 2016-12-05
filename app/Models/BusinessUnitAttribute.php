<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessUnitAttribute extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_unit_attribute';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get Values.
     */
    public function getValues()
    {
        return $this->hasMany('App\Models\BusinessUnitAttributeValue','business_unit_attribute');
    }
}
