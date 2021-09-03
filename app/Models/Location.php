<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'locations';

    protected $fillable = ['uuid', 'name', 'description'];

    public function customerSubscriptionPeriods(){
        return $this->hasMany(CustomerSubscriptionPeriod::class, 'location_id');
    }

    public function itemCosts(){
        return $this->hasMany(ItemCost::class, 'location_id');
    }

    public function serviceCosts(){
        return $this->hasMany(ServiceCost::class, 'location_id');
    }
}
