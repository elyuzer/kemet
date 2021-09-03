<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'services';

    protected $fillable = ['uuid', 'name', 'description'];

    public function items(){
        return $this->belongsToMany(Item::class, 'item_service', 'service_id', 'item_id');
    }

    public function serviceCosts(){
        return $this->hasMany(ServiceCost::class, 'service_id');
    }

    public function units(){
        return $this->belongsToMany(Unit::class, 'service_unit', 'service_id', 'unit_id');
    }
}
