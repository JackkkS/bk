<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $primaryKey = 'field_id';
    
    protected $fillable = [
        'field_name',
        'field_type',
        'price',
        'photo'
    ];
}


