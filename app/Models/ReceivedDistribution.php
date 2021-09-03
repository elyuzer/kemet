<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivedDistribution extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'received_distributions';

    protected $fillable = ['uuid', 'distribution_id', 'customer_id', 'distribution_condition_id', 'date', 'description'];

    public function products(){
        return $this->hasMany(Product::class, 'publication_id');
    }

    public function distribution(){
        return $this->belongsTo(Distribution::class, 'distribution_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function distributionConditions(){
        return $this->belongsTo(DistributionCondition::class, 'distribution_condition_id');
    }
}
