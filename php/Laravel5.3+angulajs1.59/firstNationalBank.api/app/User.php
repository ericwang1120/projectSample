<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // add the accountsJson attribute to the array
    protected $appends = array('accountsJson');

    // code for $this->accountsJson attribute
    public function getAccountsJsonAttribute($value)
    {
        $accountsJson = null;
        if ($this->accounts) {
            $accountsJson = $this->accounts;
        }
        return $accountsJson;
    }


    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
}
