<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;
    
    protected $table = 'customers';

    protected $fillable = ['uuid', 'customer_type_id', 'number', 'communication'];

    public function accounts(){
        return $this->belongsToMany(Account::class, 'account_customer', 'customer_id', 'account_id');
    }

    public function customerType(){
        return $this->belongsTo(CustomerType::class, 'customer_type_id');
    }

    public function distributionDispatches(){
        return $this->hasMany(DistributionDispatch::class, 'customer_id');
    }    

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_customer', 'customer_id', 'customer_id');
    }

    public function receivedDistributions(){
        return $this->hasMany(ReceivedDistribution::class, 'customer_id');
    }
}
