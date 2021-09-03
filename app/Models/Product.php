<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['uuid', 'name', 'publication_id', 'description'];

    public function publication(){
        return $this->belongsTo(Publication::class, 'publication_id');
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'item_product', 'product_id', 'item_id');
    }
}
