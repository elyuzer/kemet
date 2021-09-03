<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'invoices';

    protected $fillable = ['uuid', 'customer_item_sub_id', 'subscription_period_id', 'number', 'amount', 'currency_id', 'date', 'description'];

    public function customerItemSubscription(){
        return $this->belongsTo(CustomerItemSub::class, 'customer_item_sub_id');
    }

    public function subscriptionPeriod(){
        return $this->belongsTo(SubscriptionPeriod::class, 'subscription_period_id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function invoices(){
        return $this->belongsToMany(Invoice::class, 'invoice_payment', 'payment_id', 'invoice_id');
    }
}
