<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSubscriptionStatus extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'customer_subscription_status';

    protected $fillable = ['uuid', 'customer_item_sub_id', 'subscription_status_id'];

    public function customerItemSubscription(){
        return $this->belongsTo(CustomerItemSub::class, 'customer_item_sub_id');
    }

    public function subscriptionStatus(){
        return $this->belongsTo(SubscriptionStatus::class, 'subscription_status_id');
    }
}
