<?php
/**
 * ClientManager
 *
 * @file User.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file User.php
 * @project ClientManager
 * @author Wayne Brummer
 */

namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

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
         * User will have many companies
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function companies()
        {
            return $this->hasMany('App\UserCompany');
        }
    }
