<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postal extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'postals';

    protected $fillable = ['uuid', 'address'];

    public function accounts(){
        return $this->belongsToMany(Account::class, 'account_postal', 'postal_id', 'account_id');
    }
    
    public function groups(){
        return $this->belongsToMany(Group::class, 'group_postal', 'postal_id', 'group_id');
    }

    public function organisations(){
        return $this->belongsToMany(Organisation::class, 'organisation_postal', 'postal_id', 'organisation_id');
    }
}
