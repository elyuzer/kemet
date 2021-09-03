<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'units';

    protected $fillable = ['uuid', 'name', 'symbol', 'description'];

    public function services(){
        return $this->belongsToMany(Service::class, 'service_unit', 'unit_id', 'service_id');
    }

    public function subscriptionQuantities(){
        return $this->hasMany(SubscriptionQuantity::class, 'unit_id');
    }
}
