<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'groups';

    protected $fillable = ['uuid', 'name', 'organisation_id'];

    public function accounts(){
        return $this->belongsToMany(Account::class, 'account_group', 'group_id', 'account_id');
    }

    public function organisation(){
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }

    public function customers(){
        return $this->belongsToMany(Customer::class, 'group_customer', 'group_id', 'customer_id');
    }

    public function emails(){
        return $this->belongsToMany(Email::class, 'group_email', 'group_id', 'email_id');
    }

    public function phones(){
        return $this->belongsToMany(Phone::class, 'group_phone', 'group_id', 'phone_id');
    }

    public function postals(){
        return $this->belongsToMany(Postal::class, 'group_postal', 'group_id', 'postal_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_group', 'group_id', 'user_id');
    }
}
