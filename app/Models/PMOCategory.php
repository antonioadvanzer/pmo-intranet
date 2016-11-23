<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMOCategory extends Model
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
    protected $table = 'pmo_category';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * get PMO Attributes
     */
    public function getPmoAttribute()
    {
        return $this->hasMany('App\Models\PMOAttribute','pmo_category');
    }

    /**
     * get PMO Projects
     */
    public function getPmoProject()
    {
        return $this->hasMany('App\Models\PMOProject','pmo_category');
    }
}
