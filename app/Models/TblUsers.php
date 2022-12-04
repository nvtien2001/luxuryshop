<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $created_by
 * @property int      $updated_by
 * @property DateTime $created_date
 * @property DateTime $updated_date
 * @property string   $address
 * @property string   $email
 * @property string   $name
 * @property string   $password
 * @property string   $phone
 * @property string   $username
 */
class TblUsers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'created_date', 'updated_by', 'updated_date', 'address', 'email', 'enabled', 'name', 'password', 'phone', 'username'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'created_by' => 'int', 'created_date' => 'datetime', 'updated_by' => 'int', 'updated_date' => 'datetime', 'address' => 'string', 'email' => 'string', 'name' => 'string', 'password' => 'string', 'phone' => 'string', 'username' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_date', 'updated_date'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
