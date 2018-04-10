<?php
/**
 * ClientManager
 *
 * @file Company.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file Company.php
 * @project ClientManager
 * @author Wayne Brummer
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App
 */
class Company extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'contact',
        'email_address',
        'website',
        'image_url',
        'is_active',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
