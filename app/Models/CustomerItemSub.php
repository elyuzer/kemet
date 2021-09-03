<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerItemSub extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'currencies';

    protected $fillable = ['uuid', 'customer_id', 'item_id', 'date'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function customerSubscriptionStatus(){
        return $this->hasOne(CustomerSubscriptionStatus::class, 'customer_item_sub_id');
    }

    public function customerSubscriptionPeriod(){
        return $this->hasOne(CustomerSubscriptionPeriod::class, 'customer_item_sub_id');
    }

    public function invoices(){
        return $this->hasMany(Invoice::class, 'customer_item_sub_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'customer_item_sub_id');
    }

    public function subscriptionQuantities(){
        return $this->hasMany(SubscriptionQuantity::class, 'customer_item_sub_id');
    }

}
