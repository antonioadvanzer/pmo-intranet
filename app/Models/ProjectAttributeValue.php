<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProjectAttributeValue extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project', 'project_attribute', 'link'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_attribute_value';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get business unit associated.
     */
    public function getProjectAssociated()
    {
        return $this->belongsTo('App\Models\Project','project');
    }

    /**
     * Get business unit associated attribute associated.
     */
    public function getProjectAttributeAssociated()
    {
        return $this->belongsTo('App\Models\ProjectAttribute','project_attribute');
    }

    /**
     * Get link of GD associated.
     */
    public function getGDLink()
    {
        return $this->belongsTo('App\Models\GDLink','link');
    }
}
