<?php
/**
 * ClientManager.
 *
 * @file UserCompany.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'website',
        'contact',
        'image_url',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
