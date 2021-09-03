<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionQuantity extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'subscription_quantities';

    protected $fillable = ['uuid', 'customer_item_sub_id', 'amount', 'unit_id', 'media_id', 'subscription_period_id'];

    public function customerItemSubscription(){
        return $this->belongsTo(CustomerItemSub::class, 'customer_item_sub_id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function media(){
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function subscriptionPeriod(){
        return $this->belongsTo(SubscriptionPeriod::class, 'subscription_period_id');
    }
}
