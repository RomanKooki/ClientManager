<?php
/**
 * ClientManager.
 *
 * @file User.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file User.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UserCompany[] $companies
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    protected $fillable = [
            'name',
            'email',
            'password',
            'address',
            'contact',
            'id_number',
            'age',
            'image_url',
            'is_active',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
    protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * User will have many companies.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
    public function companies()
    {
        return $this->hasMany('App\UserCompany');
    }
}
