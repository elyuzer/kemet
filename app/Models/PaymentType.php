<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;
    
    protected $table = 'payment_types';

    protected $fillable = ['uuid', 'pays'];
}
