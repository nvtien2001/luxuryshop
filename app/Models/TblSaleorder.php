<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $created_by
 * @property int      $updated_by
 * @property int      $user_id
 * @property DateTime $created_date
 * @property DateTime $updated_date
 * @property string   $code
 * @property string   $customer_address
 * @property string   $customer_email
 * @property string   $customer_name
 * @property string   $customer_note
 * @property string   $customer_phone
 * @property string   $status
 * @property float    $total
 * @property float    $total_received
 */
class TblSaleorder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_saleorder';

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
        'created_by', 'created_date', 'updated_by', 'updated_date', 'code', 'customer_address', 'customer_email', 'customer_name', 'customer_note', 'customer_phone', 'isCancel', 'status', 'total', 'total_received', 'user_id'
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
        'id' => 'int', 'created_by' => 'int', 'created_date' => 'datetime', 'updated_by' => 'int', 'updated_date' => 'datetime', 'code' => 'string', 'customer_address' => 'string', 'customer_email' => 'string', 'customer_name' => 'string', 'customer_note' => 'string', 'customer_phone' => 'string', 'status' => 'string', 'total' => 'float', 'total_received' => 'float', 'user_id' => 'int'
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
