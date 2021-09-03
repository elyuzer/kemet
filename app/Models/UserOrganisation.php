<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisation extends Model
{
    use HasFactory;

    protected $table = 'user_organisation';

    protected $fillable = ['user_id', 'organisation_id'];

    public $timestamps = false;
}
