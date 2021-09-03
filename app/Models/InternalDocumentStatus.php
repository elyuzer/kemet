<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalDocumentStatus extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'internal_document_status';

    protected $fillable = ['uuid', 'document_id', 'document_status_id', 'remarks'];

    public function document(){
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function documentStatus(){
        return $this->belongsTo(DocumentStatus::class, 'document_status_id');
    }
}
