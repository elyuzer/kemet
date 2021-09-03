<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'items';

    protected $fillable = ['uuid', 'name', 'description', 'distribution_mode_id'];

    public function distributionMode(){
        return $this->belongsTo(DistributionMode::class, 'distribution_mode_id');
    }

    public function customerItems(){
        return $this->hasMany(CustomerItemSub::class, 'item_id');
    }

    public function itemCosts(){
        return $this->hasMany(ItemCost::class, 'item_id');
    }

    public function media(){
        return $this->belongsToMany(Media::class, 'item_media', 'item_id', 'media_id');
    }

    public function subscriptionPeriods(){
        return $this->belongsToMany(SubscriptionPeriod::class, 'item_period', 'item_id', 'period_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'item_product', 'item_id', 'product_id');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'item_service', 'item_id', 'service_id');
    }

    public function indenpendentItems(){
        return $this->belongsToMany(Item::class, 'item_ties', 'i_item_id', 'd_item_id');
    }

    public function denpendentItems(){
        return $this->belongsToMany(Item::class, 'item_ties', 'd_item_id', 'i_item_id');
    }
}
