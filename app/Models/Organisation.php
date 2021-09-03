<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JamesMills\Uuid\HasUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use HasFactory;
    use HasUuidTrait;
    use SoftDeletes;

    protected $table = 'organisations';

    protected $fillable = ['uuid', 'name'];

    public function groups(){
        return $this->hasMany(Group::class, 'organisation_id');
    }

    public function customers(){
        return $this->belongsToMany(Customer::class, 'organisation_customer', 'organisation_id', 'customer_id');
    }

    public function emails(){
        return $this->belongsToMany(Email::class, 'organisation_email', 'organisation_id', 'email_id');
    }

    public function phones(){
        return $this->belongsToMany(Phone::class, 'organisation_phone', 'organisation_id', 'phone_id');
    }

    public function postals(){
        return $this->belongsToMany(Postals::class, 'organisation_postal', 'organisation_id', 'postal_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'user_organisation', 'organisation_id', 'user_id');
    }

}