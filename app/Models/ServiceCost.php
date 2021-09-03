<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCost extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'service_costs';

    protected $fillable = ['uuid', 'service_id', 'amount', 'currency_id', 'location_id', 'effective_date', 'expiry_date'];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }
}
