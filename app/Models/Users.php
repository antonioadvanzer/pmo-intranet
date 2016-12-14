<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Users extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'nickname', 'email', 'password', 'type', 'company', 'rol', 'pmo'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /** 
     * Create the validation rules 
     */
    public static $rules = array(
        'email'            => 'unique:user',     // required and must be unique in the ducks table
        'nickname'         => 'unique:user'
    );

    /** 
     * Create custom validation messages 
     */
    public static $messages = array(
        'unique' => 'El :attribute ya ha sido ingresado'
    );

    /**
     * Get type user.
     */
    public function getTypeUser()
    {
        return $this->belongsTo('App\Models\TypeUser','type');
    }

    /**
     * Get company.
     */
    public function getCompany()
    {
        return $this->belongsTo('App\Models\Company','company');
    }

    /**
     * Get rol.
     */
    public function getRol()
    {
        return $this->belongsTo('App\Models\Rol','rol');
    }

    /**
     * Get pmo associated.
     */
    public function getPMO()
    {
        return $this->belongsTo('App\Models\PMO','pmo');
    }
}
