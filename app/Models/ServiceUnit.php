<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUnit extends Model
{
    use HasFactory;

    protected $table = 'service_unit';

    protected $fillable = ['service_id', 'unit_id'];

    public $timestamps = false;
}
