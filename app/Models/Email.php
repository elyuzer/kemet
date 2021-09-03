<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'emails';

    protected $fillable = ['uuid', 'address'];

    public function accounts(){
        return $this->belongsToMany(Account::class, 'account_email', 'email_id', 'account_id');
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_email', 'email_id', 'group_id');
    }

    public function organisations(){
        return $this->belongsToMany(Organisation::class, 'organisation_email', 'email_id', 'organisation_id');
    }
}
