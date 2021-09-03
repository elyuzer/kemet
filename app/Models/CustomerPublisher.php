<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerPublisher extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'customer_publishers';

    protected $fillable = ['uuid', 'customer_id', 'publisher_id'];

    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function publishers(){
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
