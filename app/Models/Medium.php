<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medium extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'medium';

    protected $fillable = ['uuid', 'name', 'description'];

    public function media(){
        return $this->belongsToMany(Media::class, 'media_medium', 'medium_id', 'media_id');
    }
}
