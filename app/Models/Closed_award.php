<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closed_award extends Model
{
    use HasFactory;
    protected $table = 'closed_award';
    protected $primaryKey = "id";
}
