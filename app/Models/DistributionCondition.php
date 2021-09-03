<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionCondition extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'distribution_conditions';

    protected $fillable = ['uuid', 'name', 'description'];

    public function receivedDistributions(){
        return $this->hasMany(ReceivedDistribution::class, 'distribution_condition_id');
    }

}
