<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectAttribute extends Model
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
    protected $table = 'project_attribute';

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
        return $this->hasMany('App\Models\ProjectAttributeValues','project_attribute');
    }
}
