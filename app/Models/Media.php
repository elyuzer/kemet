<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'media';

    protected $fillable = ['uuid', 'name', 'description'];

    public function items(){
        return $this->belongsToMany(Item::class, 'item_media', 'media_id', 'item_id');
    }

    public function medium(){
        return $this->belongsToMany(Medium::class, 'media_medium', 'media_id', 'medium_id');
    }

    public function subscriptionQuantities(){
        return $this->hasMany(SubscriptionQuantity::class, 'media_id');
    }

}
