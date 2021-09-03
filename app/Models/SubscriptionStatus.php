<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionStatus extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'subscription_status';

    protected $fillable = ['uuid', 'name', 'description'];

    public function customerSubscriptionStatus(){
        return $this->hasMany(CustomerSubscriptionStatus::class, 'subscription_status_id');
    }
}
