<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'guest_id',
        'field_id',
        'hour',
        'status',
        'checkin',
        'checkin_time',
        'checkout',
        'checkout_time'
    ];

    public function guest()
    {
        return $this->hasOne(Guest::class, 'guest_id', 'guest_id');
    }

    public function field()
    {
        return $this->hasOne(Field::class, 'field_id', 'field_id');
    }
}
