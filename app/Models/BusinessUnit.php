<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessUnit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'company', 'icon'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_unit';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Join each business unit to company.
     */
    public function getCompanyAssociated()
    {
        return $this->belongsTo('App\Models\Company','company');
    }

    /**
     * Join each business unit to company.
     */
    public function getProjects()
    {
        return $this->hasMany('App\Models\Project','business_unit');
    }
}
