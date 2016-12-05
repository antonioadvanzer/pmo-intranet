<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get all business units associated by company.
     */
    public function getBusinessUnitAssociated()
    {
        return $this->hasMany('App\Models\BusinessUnit','company');
    }

    /**
     * Get users associated with each company
     */
    public function getUsersAssociated()
    {
        return $this->hasMany('App\Models\Users','company');
    }
}
