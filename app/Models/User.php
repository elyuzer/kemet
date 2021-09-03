<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account(){
        return $this->belongsToMany(Account::class, 'user_account', 'user_id', 'account_id');
    }

    public function userLogs(){
        return $this->hasMany(UserLog::class, 'user_id');
    }

    public function organisation(){
        return $this->belongsToMany(Organisation::class, 'user_organisation', 'user_id', 'organisation_id');
    }

    public function group(){
        return $this->belongsToMany(Group::class, 'user_group', 'user_id', 'group_id');
    }
}
