<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMOAttribute extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'pmo_category','icon'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pmo_attribute';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get pmo category associated.
     */
    public function getPmoCategoryAssociated()
    {
        return $this->belongsTo('App\Models\PMOCategory','pmo_category');
    }

    /**
     * get Attributes of PMO Projects
     */
    public function getPmoProjectAttribute()
    {
        return $this->hasMany('App\Models\PMOProjectAttribute','pmo_attribute');
    }
}
