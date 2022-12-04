<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $created_by
 * @property int      $updated_by
 * @property int      $rate
 * @property int      $category_id
 * @property int      $collection_id
 * @property DateTime $created_date
 * @property DateTime $updated_date
 * @property string   $detail_description
 * @property string   $seo
 * @property string   $short_description
 * @property string   $title
 * @property float    $price
 * @property float    $price_old
 */
class TblProducts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_products';

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
        'created_by', 'created_date', 'updated_by', 'updated_date', 'detail_description', 'ishot', 'isnew', 'issale', 'price', 'price_old', 'rate', 'seo', 'short_description', 'title', 'category_id', 'collection_id'
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
        'id' => 'int', 'created_by' => 'int', 'created_date' => 'datetime', 'updated_by' => 'int', 'updated_date' => 'datetime', 'detail_description' => 'string', 'price' => 'float', 'price_old' => 'float', 'rate' => 'int', 'seo' => 'string', 'short_description' => 'string', 'title' => 'string', 'category_id' => 'int', 'collection_id' => 'int'
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
