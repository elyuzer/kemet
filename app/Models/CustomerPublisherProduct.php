<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerPublisherProduct extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'customer_publisher_product';

    protected $fillable = ['customer_publisher_id', 'product_id'];

    public $timestamps = false;
}
