<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLog extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'user_logs';

    protected $fillable = ['uuid', 'user_id', 'in', 'out'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
