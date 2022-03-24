<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiator extends Model
{
    use HasFactory;
    protected $fillable = ['initiators', 'initiators_div', 'initiators_branch'];
}
