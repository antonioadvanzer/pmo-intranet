<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PMOProjectAttribute extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pmo_project', 'pmo_attribute', 'link'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pmo_project_attribute';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get pmo project associated.
     */
    public function getPMOProjectAssociated()
    {
        return $this->belongsTo('App\Models\PMOProject','pmo_project');
    }

    /**
     * Get pmo attribute associated.
     */
    public function getPmoAttributeAssociated()
    {
        return $this->belongsTo('App\Models\PMOAttribute','pmo_attribute');
    }

    /**
     * Get link of GD associated.
     */
    public function getLinkAssociated()
    {
        return $this->belongsTo('App\Models\GDLink','link');
    }
}
