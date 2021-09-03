<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCost extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'item_costs';

    protected $fillable = ['uuid', 'item_id', 'amount', 'currency_id', 'location_id', 'effective_date', 'expiry_date'];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }
}
