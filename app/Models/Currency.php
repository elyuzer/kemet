<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'currencies';

    protected $fillable = ['uuid', 'name', 'symbol', 'description'];

    public function invoices(){
        return $this->hasMany(Invoice::class, 'currency_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'currency_id');
    }

    public function itemCosts(){
        return $this->hasMany(ItemCost::class, 'currency_id');
    }

    public function serviceCosts(){
        return $this->hasMany(ServiceCost::class, 'currency_id');
    }
}
