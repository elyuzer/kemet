<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionDispatch extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'distribution_dispatches';

    protected $fillable = ['uuid', 'distribution_id', 'customer_id', 'dispatcher_id', 'date', 'descriptions'];


    public function distribution(){
        return $this->belongsTo(Distribution::class, 'distribution_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function dispatcher(){
        return $this->belongsTo(Account::class, 'dispatcher_id');
    }
}
