<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributionMode extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'distribution_modes';

    protected $fillable = ['uuid', 'name', 'description'];

    public function items(){
        return $this->hasMany(Item::class, 'distribution_mode_id');
    }
}
