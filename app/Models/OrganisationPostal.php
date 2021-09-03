<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationPostal extends Model
{
    use HasFactory;

    protected $table = 'organisation_postal';

    protected $fillable = ['organisation_id', 'postal_id'];

    public $timestamps = false;
}
