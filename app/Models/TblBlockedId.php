<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ip
 * @property int    $num_wrong
 */
class TblBlockedId extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_blocked_id';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ip';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_login_failed', 'num_wrong'
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
        'ip' => 'string', 'num_wrong' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
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
