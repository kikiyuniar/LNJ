<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carp extends Model
{
    use HasFactory;
    protected $fillable = [
        'carp_code',
        'categories_id',
        'verified_by',
        'due_date',
        'effectiveness',
        'status_date',
        'stage',
        'status'
    ];
}
