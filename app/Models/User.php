<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'address', 'status', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * scopeKeyword
     * @param  array $query 
     * @param  string $key  
     * @return array       
     */
    public function scopeKey($query, $key)
    {
        return $query->where('name', 'like', '%' . $key . '%')
                     ->orWhere('email', 'like', '%' . $key . '%')
                     ->orWhere('address', 'like', '%' . $key . '%');
    }

    /**
     * scopeSelectuser
     * @param  array $query  
     * @param  string $select
     * @return array
     */
    public function scopeSelectbox($query, $select)
    {
        return $query->where('status', '=', $select);
    }

    /**
     * oNE TO MANY POST
     */
    public function Post()
    {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }


}
