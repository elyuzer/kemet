<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'phones';

    protected $fillable = ['uuid', 'number'];

    public function accounts(){
        return $this->belongsToMany(Account::class, 'account_phone', 'phone_id', 'account_id');
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_phone', 'phone_id', 'group_id');
    }

    public function organisations(){
        return $this->belongsToMany(Organisation::class, 'organisation_phone', 'phone_id', 'organisation_id');
    }
}
