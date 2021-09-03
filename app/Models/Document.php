<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'documents';

    protected $fillable = ['uuid', 'product_id', 'description', 'publication_date', 'effective_date', 'date_captured', 'publisher'];

    public function product(){
        return $this->hasMany(Product::class, 'product_id');
    }

    public function publishers(){
        return $this->belongsToMany(Publisher::class, 'document_publisher', 'document_id', 'publisher_id');
    }

    public function internalDocumentStatus(){
        return $this->hasOne(InternalDocumentStatus::class, 'document_id');
    }
}
