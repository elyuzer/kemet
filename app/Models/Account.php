<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'accounts';

    protected $fillable = ['uuid', 'first_name', 'middle_name', 'last_name'];

    public function customers(){
        return $this->belongsToMany(Customer::class, 'account_customer', 'account_id', 'customer_id');
    }

    public function emails(){
        return $this->belongsToMany(Email::class, 'account_email', 'account_id', 'email_id');
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'account_group', 'account_id', 'group_id');
    }

    public function distributionDispatches(){
        return $this->hasMany(DistributionDispatch::class, 'dispatcher_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_account', 'account_id', 'user_id');
    }
}
