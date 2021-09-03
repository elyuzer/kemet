<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentStatus extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'document_status';

    protected $fillable = ['uuid', 'name', 'description'];

    public function internalDocumentStatus(){
        return $this->hasMany(InternalDocumentStatus::class, 'document_status_id');
    }
}
