<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionPeriod extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'subscription_periods';

    protected $fillable = ['uuid', 'number', 'start', 'end', 'order', 'description', 'status'];

    public function customerSubscriptionPeriods(){
        return $this->hasMany(CustomerSubscriptionPeriod::class, 'subscription_period_id');
    }

    public function invoices(){
        return $this->hasMany(Invoice::class, 'subscription_period_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'subscription_period_id');
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'item_period', 'period_id', 'item_id');
    }

    public function subscriptionQuantities(){
        return $this->hasMany(SubscriptionQuantity::class, 'subscription_period_id');
    }


}
