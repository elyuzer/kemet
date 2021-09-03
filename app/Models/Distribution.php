<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distribution extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'distributions';

    protected $fillable = ['uuid', 'name', 'description', 'pubisher'];

    public function distributionDispatches(){
        return $this->hasOne(DistributionDispatch::class, 'distribution_id');
    }

    public function receivedDistribution(){
        return $this->hasOne(ReceivedDistribution::class, 'distribution_id');
    }
}
