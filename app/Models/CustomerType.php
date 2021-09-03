<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerType extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;
    
    protected $table = 'customer_types';

    protected $fillable = ['uuid', 'pays', 'name', 'description', 'external_publisher_document'];

    public function customers(){
        return $this->hasMany(Customer::class, 'customer_type_id');
    }
}
