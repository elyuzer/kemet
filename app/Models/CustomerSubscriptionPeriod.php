<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerSubscriptionPeriod extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'customer_subscription_period';

    protected $fillable = ['uuid', 'customer_item_sub_id', 'subscription_period_id', 'location_id'];

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function subscriptionPeriod(){
        return $this->belongsTo(SubscriptionPeriod::class, 'subscription_period_id');
    }

    public function customerItemSubscription(){
        return $this->belongsTo(CustomerItemSub::class, 'customer_item_sub_id');
    }
}
