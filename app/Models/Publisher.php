<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'publishers';

    protected $fillable = ['uuid', 'name', 'description'];

    public function customerPublisher(){
        return $this->hasMany(CustomerPublisher::class, 'publisher_id');
    }

    public function documents(){
        return $this->belongsToMany(Document::class, 'document_publisher', 'publisher_id', 'document_id');
    }
}
