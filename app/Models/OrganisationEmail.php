<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationEmail extends Model
{
    use HasFactory;

    protected $table = 'organisation_email';

    protected $fillable = ['organisation_id', 'email_id'];

    public $timestamps = false;
}
