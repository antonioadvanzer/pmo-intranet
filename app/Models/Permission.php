<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol', 'C', 'BU', 'P', 'ABU', 'AP','create', 'read', 'update', 'delete'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Set relation of permission with his rol.
     */
    public function getRol()
    {
        return $this->belongsTo('App\Models\Rol','rol');
    }
}
