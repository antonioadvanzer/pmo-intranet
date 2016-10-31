<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
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
    protected $table = 'rol';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get permissions associated.
     */
    public function getAllPermissions()
    {
        return $this->hasMany('App\Models\Permission','rol');
    }

    /**
     * Get user who use the rol.
     */
    public function getUsersAssociated()
    {
        return $this->hasMany('App\Models\Users','rol');
    }
}
