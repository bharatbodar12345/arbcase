<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arbitration_date extends Model
{
    use HasFactory;
    
    protected $table = 'arbitration_date';
    protected $primaryKey = "id";
}
