<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationPhone extends Model
{
    use HasFactory;

    protected $table = 'organisation_phone';

    protected $fillable = ['organisation_id', 'phone_id'];

    public $timestamps = false;
}